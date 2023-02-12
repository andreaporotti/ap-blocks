<?php if ( isset( $attributes['imageUrl'] ) && ! empty( $attributes['imageUrl'] ) ) : ?>
	<div <?php echo get_block_wrapper_attributes( array( 'class' => 'swiper-slide' ) ) ?>>
		<img class="object-cover w-full h-full" src="<?php echo $attributes['imageUrl'] ?>" alt="<?php echo $attributes['imageAlt'] ?>">
	</div>
<?php endif; ?>