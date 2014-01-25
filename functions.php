<?php
/**
 * Bootstrap SASS Wordpress Starter functions and definitions
 *
 * @package Bootstrap SASS Wordpress Starter
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'nymble_starter_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nymble_starter_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bootstrap SASS Wordpress Starter, use a find and replace
	 * to change 'bootstrap-sass-wordpress-starter' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootstrap-sass-wordpress-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bootstrap-sass-wordpress-starter' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nymble_starter_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // nymble_starter_theme_setup
add_action( 'after_setup_theme', 'nymble_starter_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function nymble_starter_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bootstrap-sass-wordpress-starter' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'nymble_starter_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nymble_starter_theme_scripts() {
	wp_enqueue_style( 'bootstrap-sass-wordpress-starter-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-sass-wordpress-starter-fontawesome', get_template_directory_uri() . '/assets/css/font-awesome-4.0.3/css/font-awesome.min.css');
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'bootstrap-sass-wordpress-starter-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );	

	wp_enqueue_script( 'bootstrap-sass-wordpress-starter-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.0.3', true );	

	wp_enqueue_script( 'bootstrap-sass-wordpress-starter-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bootstrap-sass-wordpress-starter-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nymble_starter_theme_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
	$links = str_replace('</a> (', ' <span class="badge pull-right">', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'archive_count_span');
function archive_count_span($links) {
	$links = str_replace('</a>&nbsp;(', '  <span class="badge pull-right">', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}

/**
 * Navigation Menu Adjustments
 */
// Add class to navigation sub-menu
class Nymble_Starter_Theme_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);

		if ($args->has_children && ($depth === 0)) {
		  $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
		  $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
		}
		$output .= $item_html;
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'dropdown';
		}
		if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

add_filter('nav_menu_css_class' , 'twbs_active_nav_class' , 10 , 2);
function twbs_active_nav_class($classes, $item){
     if( in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current_page_parent', $classes ) ||
    in_array( 'current_page_ancestor', $classes )
    ) {
	    $classes[] = "active";
	}
     return $classes;
}

require_once('shortcodes/shortcodes-init.php');
include('inc/meta-options.php');
include('inc/page-meta.php');
