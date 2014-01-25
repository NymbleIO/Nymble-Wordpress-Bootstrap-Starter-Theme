jQuery(document).ready(function($){

	//add bootstrap style class to sidebar list items
	$('aside.widget > ul').addClass('list-group');
	$('aside.widget > ul > li').addClass('list-group-item');

	//add default active class for first tab content and tab nav
	$('.tab-content').each(function(){
		$(this).find('.tab-pane:first-child').addClass('active');
	});
	$('.twbs-tab-wrapper > ul.nav').each(function(){
		$(this).find('li:first-child').addClass('active');
	});

	//add default active class for first collapse panel in grouped collapse
	$('.panel-group').each(function(){
		var $this = $(this),
			parentId = $this.attr('id');
		$this.find('.panel-title a').attr('data-parent', '#' + parentId);
		$this.find('.panel:first-child > .panel-collapse').addClass('in');
	});

	//init tooltip and popover
	$('.twbs-tooltip').tooltip();
	$('.twbs-popover').popover();

	//prevent go to top of page when click on popover button
	$('.twbs-popover a[href=#]').click(function(e) {
	    e.preventDefault();
	});

	//add bootstrap class to list group items
	$('.twbs-list-group').each(function(){
		var $this = $(this);
		$this.find('h1, h2, h3, h4, h5, h6').addClass('list-group-item-heading');
		$this.find('p').addClass('list-group-item-text');
	});

});