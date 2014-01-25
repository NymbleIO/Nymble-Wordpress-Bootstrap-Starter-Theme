(function ()
{
	tinymce.create("tinymce.plugins.nymbleShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("nymblePopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Nymble Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "nymble_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('nymble_button', {
                    title: "Insert Nymble Shortcode",
					image: NymbleShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Alerts", "alert" );
					a.addImmediate( b, "Horizonal Line", "[twbs_hr]" );
					a.addWithPopup( b, "Label", "label" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Grid Row", "grid" );
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Collapse", "collapse_group" );
					a.addWithPopup( b, "Modal", "modal" );
					a.addWithPopup( b, "Jumbotron", "jumbotron" );
					a.addWithPopup( b, "Progress Bar", "progress_bar" );
					a.addWithPopup( b, "Panel", "panel" );
					a.addWithPopup( b, "Tool Tip", "tooltip" );
					a.addWithPopup( b, "Popover", "popover" );
					a.addWithPopup( b, "Well", "well" );
					a.addWithPopup( b, "List Group", "list_group" );
					a.addImmediate( b, "FontAwesome", '[twbs_fa icon="fa-" size="fa-normal"]' );


				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("nymblePopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		}
	});
	
	tinymce.PluginManager.add("nymbleShortcodes", tinymce.plugins.nymbleShortcodes);
})();