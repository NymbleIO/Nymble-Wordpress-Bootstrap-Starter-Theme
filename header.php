<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Bootstrap SASS Wordpress Starter
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	<header>
		<div class="container">
		<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
	          </button>
	          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
	        </div>
	        <div class="navbar-collapse collapse">
	        <?php wp_nav_menu( array(
	        		'menu' => 'primary',
	            	'menu_class' => 'nav navbar-nav navbar-right',
	            	'container' => false,
	            	'theme_location' => 'primary',
	            	'depth' => 3,
	            	'walker' => new Nymble_Starter_Theme_Walker() 
	        ) ); ?>
	        </div>
	        <!--/.navbar-collapse -->
	      </div>
	    </div>
	</header><!-- #masthead -->
	
	<div id="content">