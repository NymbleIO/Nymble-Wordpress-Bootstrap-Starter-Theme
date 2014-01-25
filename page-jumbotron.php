<?php
/*template name: Page Jumbotron */
get_header(); ?>

	<div class="jumbotron header-jumbotron">
	  <div class="container">
	   <?php 
	   $jumbotron_content = get_post_meta( $post->ID, 'jumbotron_content', true );
	   echo wpautop( do_shortcode( $jumbotron_content ) );
	   ?>
	   </div>
	</div>
	<div class="container">
		<div class="row">
        	<div class="col-md-12">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'bootstrap-sass-wordpress-starter' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				
			<?php	
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // end of the loop. ?>

			</div><!-- .col-md-12 -->
		</div>
    </div>
<?php get_footer(); ?>
