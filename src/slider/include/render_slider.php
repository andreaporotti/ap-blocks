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
				loop: <?php echo ( $attr['loop'] == 1 ) ? 'true' : 'false' ?>
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

			<!-- Pagination -->
			<div class="swiper-pagination !-bottom-10"></div>

			<!-- Navigation -->
			<div class="swiper-button-prev !-left-12"></div>
			<div class="swiper-button-next !-right-12"></div>
		</div>
	<?php
	return ob_get_clean();
}