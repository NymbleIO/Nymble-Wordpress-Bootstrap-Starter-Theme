<?php 
/**
 * Generate Meta Box HTML Content
 */
if ( ! function_exists( 'nymble_create_meta_box' ) ) :

function nymble_create_meta_box( $post, $meta_box )
{
    if( !is_array( $meta_box ) ) return false;
    
    if( isset( $meta_box['description'] ) && $meta_box['description'] !== '' ){
    	echo '<p>'. $meta_box['description'] .'</p>';
    }
    
	wp_nonce_field( basename(__FILE__), 'nymble_meta_box_nonce' );
	echo '<table class="form-table nymble-metabox-table">';
 
	foreach( $meta_box['fields'] as $field ){

		$meta = get_post_meta( $post->ID, $field['id'], true );
		echo '<tr><th><label for="'. $field['id'] .'"><strong>'. $field['name'] .'</strong>
			  <span>'. $field['desc'] .'</span></label></th>';
		
		switch( $field['type'] ){	
			//to do
			//case textarea, text, select, multiselect, etc.
			case 'tinymce':
				echo '<script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery("#'.$field['id'].'").addClass("mceEditor");
								if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
							tinyMCE.execCommand("mceAddControl", false, "'.$field['id'].'");
							}        
						});
						</script>
						<style type="text/css">#'.$field['id'].'_tbl { border:1px solid #DFDFDF; }</style>
				<td><textarea name="nymble_meta['. $field['id'] .']" id="'. $field['id'] .'" rows="14" cols="5">'. ($meta ? wpautop($meta) : $field['std']) .'</textarea></td>';
				break;
		}
		
		echo '</tr>';
	}
 
	echo '</table>';
}

endif;

/**
 * Save Meta Box Data
 */
if ( ! function_exists( 'nymble_save_meta_box' ) ) :

function nymble_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	if ( !isset($_POST['nymble_meta']) || !isset($_POST['nymble_meta_box_nonce']) || !wp_verify_nonce( $_POST['nymble_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return;
	}
	
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	} 

	else {
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
 
	foreach ( $_POST['nymble_meta'] as $key => $val ){
		update_post_meta( $post_id, $key, $val );
	}
}

endif;

add_action( 'save_post', 'nymble_save_meta_box' );

?>