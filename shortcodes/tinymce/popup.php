<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new nymble_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="nymble-popup">

	<div id="nymble-shortcode-wrap">
		
		<div id="nymble-sc-form-wrap">
		
			<div id="nymble-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#nymble-sc-form-head -->
			
			<form method="post" id="nymble-sc-form">
			
				<table id="nymble-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary nymble-insert">Insert Shortcode</a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#nymble-sc-form-table -->
				
			</form>
			<!-- /#nymble-sc-form -->
		
		</div>
		<!-- /#nymble-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#nymble-shortcode-wrap -->

</div>
<!-- /#nymble-popup -->

</body>
</html>