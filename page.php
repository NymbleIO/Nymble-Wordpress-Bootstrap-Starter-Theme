<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Bootstrap SASS Wordpress Starter
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

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
    </div>
<?php get_footer(); ?>
