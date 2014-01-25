<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Bootstrap SASS Wordpress Starter
 */

get_header(); ?>

	<div class="container">
      <div class="row">
        <div class="col-md-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'bootstrap-sass-wordpress-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php nymble_starter_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- .col-md-8 -->
	    <div class="col-md-4">
	      <aside><?php get_sidebar(); ?></aside>
	    </div><!-- .col-md-4 -->
    </div>
<?php get_footer(); ?>
