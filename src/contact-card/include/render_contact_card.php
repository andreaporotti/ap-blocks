<?php
/**
 * Render callback for the "Contact Card" block.
 */
function apblk_contact_card_render_callback( $attr ) {
	// List of workplaces.
	$workplaces = array(
		'office' => 'Office',
		'home'   => 'Home',
		'hybrid' => 'Hybrid',
	);

	ob_start();
	?>
		<div <?php echo get_block_wrapper_attributes( array( 'class' => 'w-80 p-2 border border-solid border-gray-300 rounded-lg' ) ) ?>>
			<?php if ( $attr['imageUrl'] ) : ?>			
            	<img class="apcc-image w-full rounded-lg" src="<?php echo $attr['imageUrl'] ?>" alt="<?php echo $attr['imageAlt'] ?>" />
			<?php endif; ?>

            <div class="apcc-full-name py-1 px-2 mb-3 text-xl font-semibold border-0 border-b border-solid border-gray-300 rounded-lg"><?php echo $attr['fullName'] ?></div>

			<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'Job title', 'ap-blocks' ) ?></span>
            <div class="apcc-job-title text-base m-0"><?php echo $attr['jobTitle'] ?></div>

			<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'Email', 'ap-blocks' ) ?></span>
            <div class="apcc-email text-base m-0"><?php echo $attr['email'] ?></div>

			<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'Workplace', 'ap-blocks' ) ?></span>
            <div class="apcc-workplace text-base m-0"><?php echo $workplaces[$attr['workplace']] ?></div>

			<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'About', 'ap-blocks' ) ?></span>
            <p class="apcc-description text-base m-0"><?php echo $attr['description'] ?></p>
		</div>
	<?php
	return ob_get_clean();
}