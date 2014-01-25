<?php
/**
 * @package Bootstrap SASS Wordpress Starter
 */
?>
<div class="panel panel-default">
<article id="post-<?php the_ID(); ?>" <?php post_class('panel-body'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nymble_starter_theme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<hr>
	<div class="entry-summary">
		
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list('<ul class="entry-tags"><li class="label label-success">','</li><li class="label label-success">','</li></ul>');
				if ( $tags_list ) :
			?>
			<?php echo $tags_list;
			endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'bootstrap-sass-wordpress-starter' ), __( '1 Comment', 'bootstrap-sass-wordpress-starter' ), __( '% Comments', 'bootstrap-sass-wordpress-starter' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'bootstrap-sass-wordpress-starter' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</div>
</article><!-- #post-## -->
