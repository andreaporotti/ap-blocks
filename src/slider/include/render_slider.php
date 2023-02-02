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
					loop: true,
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

		<div <?php echo get_block_wrapper_attributes( array( 'class' => '' ) ) ?>>
			
			<!-- Slider main container -->
			<div class="swiper">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php echo do_blocks( $content ) ?>
				</div>
				
				<!-- Pagination -->
				<div class="swiper-pagination"></div>

				<!-- Navigation -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>

		</div>
	<?php
	return ob_get_clean();
}