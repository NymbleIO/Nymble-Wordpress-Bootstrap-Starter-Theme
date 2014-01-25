<?php
/**
 * @package Bootstrap SASS Wordpress Starter
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php nymble_starter_theme_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<hr>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bootstrap-sass-wordpress-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<?php edit_post_link( __( 'Edit', 'bootstrap-sass-wordpress-starter' ), '<span class="edit-link">', '</span>' ); ?>
	
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
