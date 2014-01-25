// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var nymbles = {
    	loadVals: function()
    	{
    		var shortcode = $('#_nymble_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.nymble-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('nymble_', ''),		// gets rid of the nymble_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_nymble_ushortcode').remove();
    		$('#nymble-sc-form-table').prepend('<div id="_nymble_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_nymble_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.nymble-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('nymble_', '')		// gets rid of the nymble_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_nymble_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_nymble_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_nymble_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_nymble_ushortcode').remove();
    		$('#nymble-sc-form-table').prepend('<div id="_nymble_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				nymblePopup = $('#nymble-popup');

            tbWindow.css({
                height: nymblePopup.outerHeight() + 50,
                width: nymblePopup.outerWidth(),
                marginLeft: -(nymblePopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				width: nymblePopup.outerWidth()
			});
			
			$('#nymble-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	nymbles = this,
    			popup = $('#nymble-popup'),
    			form = $('#nymble-sc-form', popup),
    			shortcode = $('#_nymble_shortcode', form).text(),
    			popupType = $('#_nymble_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		nymbles.resizeTB();
    		$(window).resize(function() { nymbles.resizeTB() });
    		
    		// initialise
    		nymbles.loadVals();
    		nymbles.children();
    		nymbles.cLoadVals();
    		
    		// update on children value change
    		$('.nymble-cinput', form).live('change', function() {
    			nymbles.cLoadVals();
    		});
    		
    		// update on value change
    		$('.nymble-input', form).change(function() {
    			nymbles.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.nymble-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_nymble_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#nymble-popup').livequery( function() { nymbles.load(); } );
});