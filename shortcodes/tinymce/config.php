<?php

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'textdomain'),
			'desc' => __('Add the button\'s url eg http://example.com', 'textdomain')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'textdomain'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'textdomain'),
			'options' => array(
				'btn-default' => 'Default - White',
				'btn-primary' => 'Primary - Blue',
				'btn-success' => 'Success - Green',
				'btn-info' => 'Info - Blue',
				'btn-warning' => 'Warning - Yellow',
				'btn-danger' => 'Danger - Red'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'textdomain'),
			'desc' => __('Select the button\'s size', 'textdomain'),
			'options' => array(
				'btn-normal' => 'Default',
				'btn-lg' => 'Large',
				'btn-sm' => 'Small',
				'btn-xs' => 'Extra Small'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'textdomain'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'textdomain'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'textdomain'),
			'desc' => __('Add the button\'s text', 'textdomain'),
		)
	),
	'shortcode' => '[twbs_button url="{{url}}" style="{{style}}" size="{{size}}" target="{{target}}"]{{content}}[/twbs_button]',
	'popup_title' => __('Insert Button Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Grid Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['grid'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[twbs_row]{{child_shortcode}}[/twbs_row]',
    'popup_title' => __('Insert Grid Row Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
        	'xs_size' => array(
        		'squeeze' => 'yes',
				'type' => 'select',
				'label' => __('Size On Extra Small Devices (<768px)', 'textdomain'),
				'desc' => '',
				'options' => array(
					'auto' => 'Auto',
					'col-xs-1' => '1/12',
					'col-xs-2' => '1/6',
					'col-xs-3' => '1/4',
					'col-xs-4' => '1/3',
					'col-xs-5' => '5/12',
					'col-xs-6' => '1/2',
					'col-xs-7' => '7/12',
					'col-xs-8' => '2/3',
					'col-xs-9' => '3/4',
					'col-xs-10' => '5/6',
					'col-xs-11' => '11/12',
					'col-xs-12' => '12/12' 
				)
			),
			'sm_size' => array(
				'squeeze' => 'yes',
				'type' => 'select',
				'label' => __('Size On Small Devices (>=768px)', 'textdomain'),
				'desc' => '',
				'options' => array(
					'auto' => 'Auto',
					'col-sm-1' => '1/12',
					'col-sm-2' => '1/6',
					'col-sm-3' => '1/4',
					'col-sm-4' => '1/3',
					'col-sm-5' => '5/12',
					'col-sm-6' => '1/2',
					'col-sm-7' => '7/12',
					'col-sm-8' => '2/3',
					'col-sm-9' => '3/4',
					'col-sm-10' => '5/6',
					'col-sm-11' => '11/12',
					'col-sm-12' => '12/12' 
				)
			),
			'md_size' => array(
				'squeeze' => 'yes',
				'type' => 'select',
				'label' => __('Size On Medium Devices (>=992px)', 'textdomain'),
				'desc' => '',
				'options' => array(
					'auto' => 'Auto',
					'col-md-1' => '1/12',
					'col-md-2' => '1/6',
					'col-md-3' => '1/4',
					'col-md-4' => '1/3',
					'col-md-5' => '5/12',
					'col-md-6' => '1/2',
					'col-md-7' => '7/12',
					'col-md-8' => '2/3',
					'col-md-9' => '3/4',
					'col-md-10' => '5/6',
					'col-md-11' => '11/12',
					'col-md-12' => '12/12' 
				)
			),
			'lg_size' => array(
				'squeeze' => 'yes',
				'type' => 'select',
				'label' => __('Size On Large Devices', 'textdomain'),
				'desc' => '',
				'options' => array(
					'auto' => 'Auto',
					'col-lg-1' => '1/12',
					'col-lg-2' => '1/6',
					'col-lg-3' => '1/4',
					'col-lg-4' => '1/3',
					'col-lg-5' => '5/12',
					'col-lg-6' => '1/2',
					'col-lg-7' => '7/12',
					'col-lg-8' => '2/3',
					'col-lg-9' => '3/4',
					'col-lg-10' => '5/6',
					'col-lg-11' => '11/12',
					'col-lg-12' => '12/12' 
				)
			),
			'visible_on' =>	array(
				'squeeze' => 'yes',
				'type' => 'select',
				'label' => __('Visible On Certain Screen Sizes', 'textdomain'),
				'desc' => '',
				'options' => array(
					'auto' => 'Always Visible',
					'visible-xs' => 'Only Visible on Extra Small Devices',
					'visible-sm' => 'Only Visible on Small Devices',
					'visible-md' => 'Only Visible on Medium Devices',
					'visible-lg' => 'Only Visible on Large Devices',
				)
			),
			'hidden_on' =>	array(
				'squeeze' => 'yes',
				'type' => 'select',
				'label' => __('Hidden On Certain Screen Sizes', 'textdomain'),
				'desc' => '',
				'options' => array(
					'auto' => 'Never Hidden',
					'hidden-xs' => 'Hidden on Extra Small Devices',
					'hidden-sm' => 'Hidden on Small Devices',
					'hidden-md' => 'Hidden on Medium Devices',
					'hidden-lg' => 'Hidden on Large Devices',
				)
			)
        ),
        'shortcode' => '[twbs_column xs_size="{{xs_size}}" sm_size="{{sm_size}}" md_size="{{md_size}}" lg_size="{{lg_size}}" visible_on="{{visible_on}}" hidden_on="{{hidden_on}}"][/twbs_column]',
        'clone_button' => __('Add Column', 'textdomain')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Label Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['label'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Label Style', 'textdomain'),
			'desc' => __('Select the label\'s style, ie the label\'s colour', 'textdomain'),
			'options' => array(
				'label-default' => 'Default - White',
				'label-primary' => 'Primary - Blue',
				'label-success' => 'Success - Green',
				'label-info' => 'Info - Blue',
				'label-warning' => 'Warning - Yellow',
				'label-danger' => 'Danger - Red'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Label Text', 'textdomain'),
			'desc' => __('Add the label\'s text content', 'textdomain')
		)
	),
	'shortcode' => '[twbs_label style="{{style}}"]{{content}}[/twbs_label]',
	'popup_title' => __('Insert Label Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Well Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['well'] = array(
	'no_preview' => true,
	'params' => array(
		'size' => array(
			'type' => 'select',
			'label' => __('Well Container Size', 'textdomain'),
			'desc' => __('Select the size of well', 'textdomain'),
			'options' => array(
				'well-default' => 'Default',
				'well-lg' => 'Large',
				'well-sm' => 'Small'
			)
		),
		'content' => array(
			'std' => 'Add Well Content',
			'type' => 'textarea',
			'label' => __('Well Content', 'textdomain'),
			'desc' => __('Add the well inside content', 'textdomain')
		)
	),
	'shortcode' => '[twbs_well size="{{size}}"]{{content}}[/twbs_well]',
	'popup_title' => __('Insert Well Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	List Group Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['list_group'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[twbs_list_group]{{child_shortcode}}[/twbs_list_group]',
    'popup_title' => __('Insert List Group Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
        	'href' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('List Item Link URL (Optional)', 'textdomain'),
                'desc' => __('Add an optional url for this list item', 'textdomain')
            ),
            'target' => array(
				'type' => 'select',
				'label' => __('List Item Link Target', 'textdomain'),
				'desc' => __('_self = open in same window. _blank = open in new window', 'textdomain'),
				'options' => array(
					'_self' => '_self',
					'_blank' => '_blank'
				)
			),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[twbs_list_group_item href="{{href}}" target="{{target}}"]{{content}}[/twbs_list_group_item]',
        'clone_button' => __('Add List Item', 'textdomain')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Progresss Bar Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['progress_bar'] = array(
	'no_preview' => true,
	'params' => array(
		'value' => array(
			'std' => '50',
			'type' => 'text',
			'label' => __('Progress Bar Value (1-100)', 'textdomain'),
			'desc' => __('Enter in progress bar value', 'textdomain')
		),
		'description' => array(
			'std' => 'Progress Bar Description',
			'type' => 'text',
			'label' => __('Progress Bar Description (For Screen Readers Only)', 'textdomain'),
			'desc' => __('Enter in progress bar description', 'textdomain')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Progress Bar Style', 'textdomain'),
			'desc' => __('Select the progress bar\'s style', 'textdomain'),
			'options' => array(
				'progress-bar-default' => 'Default - Blue',
				'progress-bar-success' => 'Success - Green',
				'progress-bar-info' => 'Info - Blue',
				'progress-bar-warning' => 'Warning - Yellow',
				'progress-bar-danger' => 'Danger - Red'
			)
		),
		'striped' => array(
			'type' => 'select',
			'label' => __('Striped Progress Bar', 'textdomain'),
			'desc' => __('Add strips to the progress bar?', 'textdomain'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		),
		'animated' => array(
			'type' => 'select',
			'label' => __('Animated Progress Bar', 'textdomain'),
			'desc' => __('Add animation effecs to progress bar?', 'textdomain'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		)
	),
	'shortcode' => '[twbs_progress_bar value="{{value}}" description="{{description}}" style="{{style}}" striped="{{striped}}" animated="{{animated}}"]',
	'popup_title' => __('Insert Progress Bar Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Jumbotron Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['jumbotron'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Jumbotron Style', 'textdomain'),
			'desc' => __('Select the jumbotron\'s style', 'textdomain'),
			'options' => array(
				'boxed' => 'Boxed Jumbotron',
				'full-width' => 'Full Width Jumbotron'
			)
		),
		'content' => array(
			'std' => 'Your Jumbotron Content',
			'type' => 'textarea',
			'label' => __('Jumbotron Content', 'textdomain'),
			'desc' => ''
		)
	),
	'shortcode' => '[twbs_jumbotron style="{{style}}"]{{content}}[/twbs_jumbotron]',
	'popup_title' => __('Insert Jumbotron Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Modal Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['modal'] = array(
	'no_preview' => true,
	'params' => array(
		'modal_id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Unique Modal Form ID', 'textdomain'),
			'desc' => __('Add an unique form id for modal, ie mymodal1', 'textdomain')
		),
		'button_text' => array(
			'std' => 'Trigger Button Text',
			'type' => 'text',
			'label' => __('Modal Form Trigger Button\'s Text', 'textdomain'),
			'desc' => __('Add the button\'s text', 'textdomain'),
		),
		'button_style' => array(
			'type' => 'select',
			'label' => __('Trigger Button Style', 'textdomain'),
			'desc' => __('Select the modal form trigger button\'s style, ie the button\'s colour', 'textdomain'),
			'options' => array(
				'btn-default' => 'Default - White',
				'btn-primary' => 'Primary - Blue',
				'btn-success' => 'Success - Green',
				'btn-info' => 'Info - Blue',
				'btn-warning' => 'Warning - Yellow',
				'btn-danger' => 'Danger - Red'
			)
		),
		'button_size' => array(
			'type' => 'select',
			'label' => __('Trigger Button Size', 'textdomain'),
			'desc' => __('Select the modal form trigger button\'s size', 'textdomain'),
			'options' => array(
				'btn-lg' => 'Default',
				'btn-normal' => 'Large',
				'btn-sm' => 'Small',
				'btn-xs' => 'Extra Small'
			)
		),
		'modal_header' => array(
			'std' => 'Modal Header Title',
			'type' => 'text',
			'label' => __('Modal Form \'s Header Title Text', 'textdomain'),
			'desc' => __('Add the modal \'s header text', 'textdomain'),
		),
		'content' => array(
			'std' => 'Modal Form Content',
			'type' => 'textarea',
			'label' => __('Modal Form \'s Content', 'textdomain'),
			'desc' => __('Add the modal \'s full content', 'textdomain'),
		)
	),
	'shortcode' => '[twbs_modal modal_id="{{modal_id}}" button_text="{{button_text}}" button_style="{{button_style}}" modal_header="{{modal_header}}"]{{content}}[/twbs_modal]',
	'popup_title' => __('Insert Button Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'textdomain'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'textdomain'),
			'options' => array(
				'success' => 'Green - Success',
				'info' => 'Blue - Info',
				'warning' => 'Yellow - Warning',
				'danger' => 'Red - Danger'
			)
		),
		'dismissable' => array(
			'type' => 'select',
			'label' => __('Dismissable', 'textdomain'),
			'desc' => __('Is this alert dismissable?', 'textdomain'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'textdomain'),
			'desc' => __('Add the alert\'s text', 'textdomain'),
		)
		
	),
	'shortcode' => '[twbs_alert style="{{style}}" dismissable="{{dismissable}}"]{{content}}[/twbs_alert]',
	'popup_title' => __('Insert Alert Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['collapse_group'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[twbs_collapse_group]{{child_shortcode}}[/twbs_collapse_group]',
    'popup_title' => __('Insert Collapse Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Collapse Panel Title', 'textdomain'),
                'desc' => __('Title of the Collapse Panel', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Collapse Panel Content',
                'type' => 'textarea',
                'label' => __('Collapse Panel Content', 'textdomain'),
                'desc' => __('Add the Collapse Panel content', 'textdomain')
            )
        ),
        'shortcode' => '[twbs_collapse title="{{title}}"]{{content}}[/twbs_collapse]',
        'clone_button' => __('Add Grouped Collapse Panel', 'textdomain')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['tabs'] = array(
    'params' => array(
    	'style' => array(
    		'type' => 'select',
			'label' => __('Tab Style', 'textdomain'),
			'desc' => __('Select the tab\'s style, tab nav or pill style', 'textdomain'),
			'options' => array(
				'tab' => 'Tab Navigation',
				'pill' => 'Tab Pills'
			)
		)
    ),
    'no_preview' => true,
    'shortcode' => '[twbs_tabs style="{{style}}"]{{child_shortcode}}[/twbs_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[twbs_tab title="{{title}}"]{{content}}[/twbs_tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Panel Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['panel'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Panel Style', 'textdomain'),
			'desc' => __('Select the panel\'s style', 'textdomain'),
			'options' => array(
				'panel-default' => 'Default - White',
				'panel-primary' => 'Primary - Blue',
				'panel-success' => 'Success - Green',
				'panel-info' => 'Info - Blue',
				'panel-warning' => 'Warning - Yellow',
				'panel-danger' => 'Danger - Red'
			)
		),
		'header' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Panel Header (Optional)', 'textdomain'),
			'desc' => __('Enter in panel\'s header text', 'textdomain')
		),
		'header_font' => array(
			'type' => 'select',
			'label' => __('Header Font Style', 'textdomain'),
			'desc' => __('Select the panel header font\'s style', 'textdomain'),
			'options' => array(
				'p' => 'Paragraph',
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6'
			)
		),
		'content' => array(
			'std' => 'Panel Body Content',
			'type' => 'textarea',
			'label' => __('Panel\'s Body ContentText', 'textdomain'),
			'desc' => __('Add the button\'s text', 'textdomain'),
		),
		'footer' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Panel Footer (Optional)', 'textdomain'),
			'desc' => __('Enter in panel\'s footer text', 'textdomain')
		),
	),
	'shortcode' => '[twbs_panel style="{{style}}" header="{{header}}" header_font="{{header_font}}" footer="{{footer}}"]{{content}}[/twbs_panel]',
	'popup_title' => __('Insert Panel Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Tooltip Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['tooltip'] = array(
	'no_preview' => true,
	'params' => array(
		'text' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Tooltip Text', 'textdomain'),
			'desc' => __('Enter in your tooltip text', 'textdomain')
		),
		'position' => array(
			'type' => 'select',
			'label' => __('Tooltip Position', 'textdomain'),
			'desc' => __('Select the tooltip posistion. ie top. ', 'textdomain'),
			'options' => array(
				'top' => 'Top',
				'Right' => 'Right',
				'left' => 'Left',
				'bottom' => 'Bottom'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content Tooltip is For', 'textdomain'),
			'desc' => __('Add the content where tooltip is for.', 'textdomain'),
		)
	),
	'shortcode' => '[twbs_tooltip text="{{text}}" position="{{position}}"]{{content}}[/twbs_tooltip]',
	'popup_title' => __('Insert Tooltip Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Popover Config
/*-----------------------------------------------------------------------------------*/

$nymble_shortcodes['popover'] = array(
	'no_preview' => true,
	'params' => array(
		'popover_title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Popover Title', 'textdomain'),
			'desc' => __('Enter in your popover text', 'textdomain')
		),
		'popover_content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Popover Content', 'textdomain'),
			'desc' => __('Enter in your popover content', 'textdomain')
		),
		'position' => array(
			'type' => 'select',
			'label' => __('Popover Position', 'textdomain'),
			'desc' => __('Select the popover posistion. ie top. ', 'textdomain'),
			'options' => array(
				'top' => 'Top',
				'right' => 'Right',
				'left' => 'Left',
				'bottom' => 'Bottom'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content Popover is For', 'textdomain'),
			'desc' => __('Add the content where popover is for.', 'textdomain'),
		)
	),
	'shortcode' => '[twbs_popover popover_title="{{popover_title}}" popover_content="{{popover_content}}" position="{{position}}"]{{content}}[/twbs_popover]',
	'popup_title' => __('Insert Popover Shortcode', 'textdomain')
);

?>