<?php 
add_action('add_meta_boxes', 'nymble_metabox_page');
function nymble_metabox_page(){

	$meta_box = array(
		'id' => 'metabox-jumbotron',
		'title' =>  __('Jumbotron Content', 'hehe'),
		'description' => __('', 'hehe'),
		'post_type' => 'page',
		'context' => 'normal',
		'priority' => 'core',
		'fields' => array(
			array(
				'name' =>  __('Select which page header option you want', 'hehe'),
				'desc' => '',
				'id' => 'jumbotron_content',
				'type' => 'tinymce',
				'std' => ''
			)
		)
	);

	$callback = create_function( '$post,$meta_box', 'nymble_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );

}
?>