<?php
/**
 * Render callback for the "Slider" block.
 */
function apblk_slider_render_callback( $attr ) {
	ob_start();
	?>
		<div <?php echo get_block_wrapper_attributes( array( 'class' => '' ) ) ?>>
			Slider frontend output...
		</div>
	<?php
	return ob_get_clean();
}