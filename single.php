<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Bootstrap SASS Wordpress Starter
 */

get_header(); ?>

	<div class="container">
      <div class="row">
        <div class="col-md-8">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php nymble_starter_theme_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- .col-md-8 -->
	    <div class="col-md-4">
	      <aside><?php get_sidebar(); ?></aside>
	    </div><!-- .col-md-4 -->
    </div>
<?php get_footer(); ?>