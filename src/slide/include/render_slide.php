<?php
/**
 * Render callback for the "Slide" block.
 */
function apblk_slide_render_callback( $attr ) {
	ob_start();
	?>
		<div <?php echo get_block_wrapper_attributes( array( 'class' => 'swiper-slide' ) ) ?>>
			<img class="object-cover w-full h-full" src="<?php echo $attr['imageUrl'] ?>" alt="<?php echo $attr['imageAlt'] ?>">
		</div>
	<?php
	return ob_get_clean();
}