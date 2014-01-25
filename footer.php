<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bootstrap SASS Wordpress Starter
 */
?>
	</div><!-- #content -->
	<hr>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container text-center">
			<?php do_action( 'nymble_starter_theme_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'bootstrap-sass-wordpress-starter' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'bootstrap-sass-wordpress-starter' ), 'Bootstrap SASS Wordpress Starter', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>