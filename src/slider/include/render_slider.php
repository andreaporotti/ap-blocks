<?php
/**
 * Render callback for the "Slider" block.
 */
function apblk_slider_render_callback( $attr, $content ) {
	wp_enqueue_script( 'ap-blocks-swiper' );
	wp_enqueue_style( 'ap-blocks-swiper' );

	ob_start();
	?>
		<script>
			const apBlocksSliderConfig = {
				slidesPerView: <?php echo $attr['slidesPerView'] ?>,
				spaceBetween: <?php echo $attr['spaceBetween'] ?>,
				loop: <?php echo ( $attr['loop'] == 1 ) ? 'true' : 'false' ?>,
				pagination: <?php echo ( $attr['pagination'] == 1 ) ? 'true' : 'false' ?>,
				navigation: <?php echo ( $attr['navigation'] == 1 ) ? 'true' : 'false' ?>
			}
		</script>

		<div <?php echo get_block_wrapper_attributes( array( 'class' => 'relative' ) ) ?>>
			<!-- Slider main container -->
			<div class="swiper h-[400px] border border-solid border-gray-300 rounded-lg flex justify-center items-center">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php echo do_blocks( $content ) ?>
				</div>
			</div>

			<?php if ( $attr['pagination'] == 1 ) : ?>
				<!-- Pagination -->
				<div class="swiper-pagination !-bottom-10"></div>
			<?php endif; ?>

			<?php if ( $attr['navigation'] == 1 ) : ?>
				<!-- Navigation -->
				<div class="swiper-button-prev !-left-12"></div>
				<div class="swiper-button-next !-right-12"></div>
			<?php endif; ?>
		</div>
	<?php
	return ob_get_clean();
}