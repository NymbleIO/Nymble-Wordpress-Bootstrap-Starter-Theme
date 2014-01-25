<?php
/**
 * The template for displaying search forms in Bootstrap SASS Wordpress Starter
 *
 * @package Bootstrap SASS Wordpress Starter
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
	  <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bootstrap-sass-wordpress-starter' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
      <span class="input-group-btn">
		<input type="submit" class="btn btn-regular" value="Go !">
	  </span>
    </div><!-- /input-group -->
</form>
