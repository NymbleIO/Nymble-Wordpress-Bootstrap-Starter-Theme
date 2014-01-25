<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstrap SASS Wordpress Starter
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

			<header class="entry-header">
			<div class="container">
				<h1 class="entry-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'bootstrap-sass-wordpress-starter' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'bootstrap-sass-wordpress-starter' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'bootstrap-sass-wordpress-starter' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bootstrap-sass-wordpress-starter' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'bootstrap-sass-wordpress-starter' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bootstrap-sass-wordpress-starter' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'bootstrap-sass-wordpress-starter' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'bootstrap-sass-wordpress-starter');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'bootstrap-sass-wordpress-starter');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'bootstrap-sass-wordpress-starter' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'bootstrap-sass-wordpress-starter' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'bootstrap-sass-wordpress-starter' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'bootstrap-sass-wordpress-starter' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'bootstrap-sass-wordpress-starter' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'bootstrap-sass-wordpress-starter' );

						else :
							_e( 'Archives', 'bootstrap-sass-wordpress-starter' );

						endif;
					?>
				</h1>
				<hr>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
				</div>
			</header><!-- .page-header -->


	<div class="container">
      <div class="row">
        <div class="col-md-8">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

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
