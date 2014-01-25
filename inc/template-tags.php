<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bootstrap SASS Wordpress Starter
 */

if ( ! function_exists( 'nymble_starter_theme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function nymble_starter_theme_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li>
		  <?php next_posts_link( __( '<i class="fa fa-angle-left"></i>&nbsp;Older posts', 'bootstrap-sass-wordpress-starter' ) ); ?>
        </li>
        <?php endif; ?>
        <?php if ( get_previous_posts_link() ) : ?>
        <li>
          <?php previous_posts_link( __( 'Newer posts&nbsp;<i class="fa fa-angle-right"></i>', 'bootstrap-sass-wordpress-starter' ) ); ?>
        </li>
         <?php endif; ?>
	</ul><!-- posts nav -->
	<?php
}
endif;

if ( ! function_exists( 'nymble_starter_theme_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function nymble_starter_theme_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<hr>
	<ul class="pager">
		<?php
			previous_post_link( '<li class="prev-post pull-left">%link</li>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'bootstrap-sass-wordpress-starter' ) );
			next_post_link(     '<li class="next-post pull-right">%link</li>',     _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link',     'bootstrap-sass-wordpress-starter' ) );
		?>
	</ul><!-- posts nav -->
	<?php
}
endif;

if ( ! function_exists( 'nymble_starter_theme_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function nymble_starter_theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class('panel'); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'bootstrap-sass-wordpress-starter' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'bootstrap-sass-wordpress-starter' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent well' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body panel panel-default">
			<div class="row panel-body">
			<div class="comment-meta hidden-xs col-sm-2 col-md-2">
				
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, '72' ); } ?>
				</div><!-- .comment-author -->
				
			</div><!-- .comment-meta -->

			<div class="comment-content col-xs-12 col-sm-10 col-md-10">
				<div class="comment-metadata">
					<span><i class="fa fa-user icon-light-grey icon-margin-right"></i></span>
					<?php echo get_comment_author_link(); ?>
					<span><i class="fa fa-clock-o icon-light-grey icon-margin-right icon-margin-left"></i></span>
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'bootstrap-sass-wordpress-starter' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'bootstrap-sass-wordpress-starter' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bootstrap-sass-wordpress-starter' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="btn btn-default btn-xs">',
					'after'     => '</div>',
				) ) );
			?>
			</div><!-- .comment-content -->
			</div>
			
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for nymble_starter_theme_comment()

if ( ! function_exists( 'nymble_starter_theme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function nymble_starter_theme_posted_on() {
	$time_string = '<span class="entry-date published" datetime="%1$s">%2$s</span>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on"><i class="fa fa-clock-o icon-light-grey icon-margin-right"></i> %1$s</span><span class="byline">%2$s</span>', 'bootstrap-sass-wordpress-starter' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><i class="fa fa-smile-o icon-light-grey icon-margin-right"></i><a href="%1$s"> %2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);

	$categories_list = get_the_category_list( __( ', ', 'bootstrap-sass-wordpress-starter' ) );
				if ( $categories_list && nymble_starter_theme_categorized_blog() ) { ?>
			<span class="cat-links">
				<i class="fa fa-folder-o icon-light-grey icon-margin-right"></i>
				<?php printf( $categories_list ); ?>
			</span> 
	<?php } 
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function nymble_starter_theme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so nymble_starter_theme_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so nymble_starter_theme_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in nymble_starter_theme_categorized_blog.
 */
function nymble_starter_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'nymble_starter_theme_category_transient_flusher' );
add_action( 'save_post',     'nymble_starter_theme_category_transient_flusher' );
