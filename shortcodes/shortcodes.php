<?php

/*-----------------------------------------------------------------------------------*/
/*	Grid Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_row')) {
	function twbs_row( $atts, $content = null ) {
		extract(shortcode_atts(array(), $atts));
		
	   return '<div class="row">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('twbs_row', 'twbs_row');
}

if (!function_exists('twbs_column')) {
	function twbs_column( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'xs_size' => '',
			'sm_size' => '',
			'md_size' => '',
			'lg_size' => '',
			'visible_on' => '',
			'hidden_on' => ''
		), $atts));

		$colAtts = array($xs_size, $sm_size, $md_size, $lg_size, $visible_on, $hidden_on);
		$colAttClass = array();

		foreach ($colAtts as $colsAtt) {
			if ( $colsAtt !== 'auto') {
				$colAttClass[] = $colsAtt;
			}
		}

		$colAttClass = implode( ' ', $colAttClass );
		
		return '<div class="' . $colAttClass . '">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('twbs_column', 'twbs_column');
}

/*-----------------------------------------------------------------------------------*/
/*	Well
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_well')) {
	function twbs_well( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'size' => ''
	    ), $atts));
		
	   return '<div class="well ' . $size . '">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('twbs_well', 'twbs_well');
}

/*-----------------------------------------------------------------------------------*/
/*	Horizonal Line
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_hr')) {
	function twbs_hr( $atts, $content = null ) {
	   return '<hr>';
	}
	add_shortcode('twbs_hr', 'twbs_hr');
}


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_button')) {
	function twbs_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'btn-default',
			'size' => 'btn-normal'
	    ), $atts));
		
	   return '<a target="'.$target.'" class="btn '.$size.' '.$style .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('twbs_button', 'twbs_button');
}

/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_modal')) {
	function twbs_modal( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'modal_id' => 'mymodal1',
			'button_text' => 'trigger modal',
			'button_style' => 'btn-default',
			'button_size' => 'btn-normal',
			'modal_header' => 'My Modal Form Header'
	    ), $atts));
		
		$button_class = array('btn', $button_style, $button_size);
		$button_class = implode( ' ', $button_class );

	    return '<button class="' . $button_class . '" data-toggle="modal" data-target="#' . sanitize_title( $modal_id ) . '">' . $button_text . '</button>' 
	   		  .'<div class="modal fade" id="' . sanitize_title( $modal_id ) . '" tabindex="-1" role="dialog" aria-labelledby="' . sanitize_title( $modal_id ) . '_label" aria-hidden="true">
			  	 <div class="modal-dialog">
				   	<div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="' . sanitize_title( $modal_id ) . '_label">' . $modal_header. '</h4>
				      </div>
				      <div class="modal-body">'
	   		  			. do_shortcode($content) .
	   		  		 '</div><!-- /.modal-body -->
	   		  		</div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
			  </div><!-- /.modal -->';
	}
	add_shortcode('twbs_modal', 'twbs_modal');
}

/*-----------------------------------------------------------------------------------*/
/*	Labels
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_label')) {
	function twbs_label( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => 'label-default'
	    ), $atts));
		
	   return '<span class="label ' . $style . '">' . do_shortcode($content) . '</span>';
	}
	add_shortcode('twbs_label', 'twbs_label');
}

/*-----------------------------------------------------------------------------------*/
/*	FontAwesome
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_fa')) {
	function twbs_fa( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon' => '',
			'size' => ''
	    ), $atts));
		
	   return '<i class="fa ' . $icon . ' ' . $size . '"></i>';
	}
	add_shortcode('twbs_fa', 'twbs_fa');
}

/*-----------------------------------------------------------------------------------*/
/*	Labels
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_progress_bar')) {
	function twbs_progress_bar( $atts ) {
		extract(shortcode_atts(array(
			'value' => '50',
			'description' => '',
			'style' => 'label-default',
			'striped' => 'no',
			'animated' => 'no'
	    ), $atts));
		
		$is_striped = ( $striped == 'yes' ) ? 'progress-striped' : '';
		$is_animated = ( $animated == 'yes' ) ? 'active' : '';

		$progress_bar_wrapper_class = array(
			'progress',
			$is_striped,
			$is_animated
		);
		$progress_bar_wrapper_class = implode( ' ', $progress_bar_wrapper_class );

	    return '<div class="' . $progress_bar_wrapper_class . '">
				  <div class="progress-bar ' . $style . '" role="progressbar" aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $value . '%">
				    <span class="sr-only"> ' . $description . ' </span>
				  </div>
				</div>';
	}
	add_shortcode('twbs_progress_bar', 'twbs_progress_bar');
}

/*-----------------------------------------------------------------------------------*/
/*	Jumbotron
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_jumbotron')) {
	function twbs_jumbotron( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => 'boxed'
	    ), $atts));
		
		if ( $style == 'boxed' ){
	    	return '<div class="jumbotron">' . do_shortcode($content) . '</div>';
		}else{
			return '<div class="jumbotron"><div class="container">' . do_shortcode($content) . '</div></div>';
		}
	}
	add_shortcode('twbs_jumbotron', 'twbs_jumbotron');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_alert')) {
	function twbs_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'success',
			'dismissable' => 'no'
	    ), $atts));
		
		if ( $dismissable == 'no'){
			return '<div class="alert alert-'.$style.'">' . do_shortcode($content) . '</div>';
		}else {
			return '<div class="alert alert-'.$style.' alert-dismissable">' .
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . do_shortcode($content) . '</div>';
		}
	}
	add_shortcode('twbs_alert', 'twbs_alert');
}

/*-----------------------------------------------------------------------------------*/
/*	Panel
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_panel')) {
	function twbs_panel( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'panel-default',
			'header' => '',
			'header_font' => 'span',
			'footer' => ''
	    ), $atts));

		$valid_header_fonts = array('p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');

		if ( ! in_array( $header_font, $valid_header_fonts) ) {
			$header_font = 'p';
		}

		$header_content = ( !empty($header) && $header !== '') ? '<div class="panel-heading"><' . $header_font . ' class="panel-title">' . $header . '</' . $header_font . '></div>' : '';

		$footer_content = ( !empty($footer) && $footer !== '') ? '<div class="panel-footer">' . $footer . '</div>' : '';

		return '<div class="panel ' . $style . '">' . $header_content . '<div class="panel-body">' . do_shortcode($content) . '</div>' . $footer_content . '</div>';

	}
	add_shortcode('twbs_panel', 'twbs_panel');
}

/*-----------------------------------------------------------------------------------*/
/*	Tooltip
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_tooltip')) {
	function twbs_tooltip( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'text' => '',
			'position' => 'top'
	    ), $atts));

		return '<span class="twbs-tooltip" data-toggle="tooltip" data-placement="' . $position . '" title="' . esc_html($text) . '">' . do_shortcode($content) . '</span>';

	}
	add_shortcode('twbs_tooltip', 'twbs_tooltip');
}

/*-----------------------------------------------------------------------------------*/
/*	Popover
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_popover')) {
	function twbs_popover( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'popover_title' => '',
			'popover_content' => '',
			'position' => 'top'
	    ), $atts));

		return '<div class="twbs-popover" data-placement="' . $position . '" title="' . esc_html($popover_title) . '" data-content="'. esc_html($popover_content) . '">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('twbs_popover', 'twbs_popover');
}

/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_tabs')) {
	function twbs_tabs( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'style' => 'nav'
		), $atts ) );

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/title="([^\""]+)"/', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();

		if( isset( $matches[1] ) ){ 
			$tab_titles = $matches[1]; 
		}

		$output = '';
		
		if( count($tab_titles) ){

			$output .= '<div class="twbs-tab-wrapper"><ul class="nav nav-' . $style . 's">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#twbs-tab-'. sanitize_title( $tab[0] ) .'" data-toggle="' . $style . '">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul><div class="tab-content">';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'twbs_tabs', 'twbs_tabs' );
}

if (!function_exists('twbs_tab')) {
	function twbs_tab( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'title' => 'Tab' 
		), $atts ) );
		
		return '<div id="twbs-tab-'. sanitize_title( $title ) .'" class="tab-pane">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'twbs_tab', 'twbs_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*	List Group Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_list_group')) {
	function twbs_list_group( $atts, $content = null ) {
		extract( shortcode_atts( array(), $atts ) );
		
		return '<div class="twbs-list-group">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'twbs_list_group', 'twbs_list_group' );
}

if (!function_exists('twbs_list_group_item')) {
	function twbs_list_group_item( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'href' => '',
			'target' => '', 
		), $atts ) );

		if ( ! empty($href) && $href !== '' ){
			if( ! preg_match('/^http:\/\//', $href) ){
				$href = 'http://' . $href;
			}
			return '<a href="' . $href . '" target="' . $target . '" class="list-group-item">'. do_shortcode( $content ) . '</a>';
		} else {
			return '<li class="list-group-item">'. do_shortcode( $content ) . '</li>';
		}
	}
	add_shortcode( 'twbs_list_group_item', 'twbs_list_group_item' );
}



/*-----------------------------------------------------------------------------------*/
/*	Collapse Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('twbs_collapse_group')) {
	function twbs_collapse_group( $atts, $content = null ) {
		extract( shortcode_atts( array(), $atts ) );

		// Extract the tab titles for use in the collapse widget.
		preg_match_all( '/title="([^\""]+)"/', $content, $matches, PREG_OFFSET_CAPTURE );

		$collapse_titles = array();

		if( isset( $matches[1] ) ){ 
			$collapse_titles = $matches[1]; 
		}

		$output = '';
		
		if( count($collapse_titles) ){

			$output .= '<div class="panel-group" id="twbs-collapse-' . uniqid() . '">';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'twbs_collapse_group', 'twbs_collapse_group' );
}

if (!function_exists('twbs_collapse')) {
	function twbs_collapse( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			'title' => 'Collapse' 
		), $atts ) );
		
		return '<div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="" href="#collapse-' . sanitize_title( $title ) .'">'
				          . esc_html( $title ) . 
				        '</a>
				      </h4>
				    </div>
	    			<div id="collapse-' . sanitize_title( $title ) .'" class="panel-collapse collapse">
	      				<div class="panel-body">'. do_shortcode( $content ) . '</div>
      				</div>
      			</div>';
	}
	add_shortcode( 'twbs_collapse', 'twbs_collapse' );
}

?>