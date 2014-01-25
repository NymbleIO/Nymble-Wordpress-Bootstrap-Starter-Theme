<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to nymble_starter_theme_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Bootstrap SASS Wordpress Starter
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'bootstrap-sass-wordpress-starter' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'bootstrap-sass-wordpress-starter' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bootstrap-sass-wordpress-starter' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bootstrap-sass-wordpress-starter' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use nymble_starter_theme_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define nymble_starter_theme_comment() and that will be used instead.
				 * See nymble_starter_theme_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'nymble_starter_theme_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'bootstrap-sass-wordpress-starter' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bootstrap-sass-wordpress-starter' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bootstrap-sass-wordpress-starter' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'bootstrap-sass-wordpress-starter' ); ?></p>
	<?php endif; ?>

	<?php /**
	 * Display Comment Form
	 */
	$required_text = null;

	$args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => __( 'Leave a Reply', 'bootstrap-sass-wordpress-starter' ),
	  'title_reply_to'    => __( 'Leave a Reply to %s', 'bootstrap-sass-wordpress-starter' ),
	  'cancel_reply_link' => __( '<span class="btn btn-default btn-xs cancel-reply-button">Cancel Reply</span>', 'bootstrap-sass-wordpress-starter' ),
	  'label_submit'      => __( 'Post Comment', 'bootstrap-sass-wordpress-starter' ),

	  'comment_field' =>  '<div class="row"><div class="form-group col-md-12"><div class="input-group">' .
	      '<span class="input-group-addon"><i class="fa fa-pencil"></i></span>'. '<textarea id="comment" class="form-control" name="comment" cols="45" rows="8" placeholder="Comments*" required></textarea></div></div></div>',

	  'must_log_in' => '<p class="must-log-in">' .
	                     sprintf(
	                          __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	                          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	                        ) . '</p>',

	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',

	  'comment_notes_before' => '<p class="comment-notes">' .
	    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
	    '</p>',

	  'comment_notes_after' => '',

	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<div class="row"><div class="form-group col-md-6 col-sm-6"><div class="input-group">' .
	      '<span class="input-group-addon"><i class="fa fa-user"></i></span>' .
	      '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30" placeholder="Name*" required/></div></div>',

	    'email' =>
	      '<div class="form-group col-md-6 col-sm-6"><div class="input-group">' .
	      '<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>' .
	      '<input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30" placeholder="Email*" required/></div></div>',

	    'url' =>
	      '<div class="form-group col-md-12"><div class="input-group">' .
	      '<span class="input-group-addon"><i class="fa fa-globe"></i></span>' .
	      '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	      '" size="30" placeholder="Website" /></div></div></div>'
	    )
	  ),
	);

	comment_form($args); ?>

</div><!-- #comments -->
