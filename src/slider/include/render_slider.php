<?php
/**
 * Render callback for the "Slider" block.
 */
function apblk_slider_render_callback( $attr, $content ) {
	ob_start();
	?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
		<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				const swiper = new Swiper('.swiper', {
					loop: false,
					pagination: {
						el: '.swiper-pagination',
					},
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				});
			});
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