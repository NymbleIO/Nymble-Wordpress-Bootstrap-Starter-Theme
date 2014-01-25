<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Bootstrap SASS Wordpress Starter
 */

get_header(); ?>

	<div class="container">
        <div class="row">
            <div class="col-md-8">
                <header class="entry-header">
				    <h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bootstrap-sass-wordpress-starter' ); ?></h1>
			     <hr>
                </header><!-- .page-header -->
            </div><!-- .col-md-8 -->
        <div class="col-md-4">
            <aside><?php get_sidebar(); ?></aside><!-- .col-md-4 -->
        </div>
    </div>

<?php get_footer(); ?>