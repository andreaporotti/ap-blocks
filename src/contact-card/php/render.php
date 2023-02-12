<?php
// List of workplaces.
$workplaces = array(
	'office' => 'Office',
	'home'   => 'Home',
	'hybrid' => 'Hybrid',
);
?>

<div <?php echo get_block_wrapper_attributes( array( 'class' => 'w-80 p-2 border border-solid border-gray-300 rounded-lg align' . $attributes['align'] ) ) ?>>
	<?php if ( $attributes['imageUrl'] ) : ?>			
		<img class="apcc-image w-full rounded-lg" src="<?php echo $attributes['imageUrl'] ?>" alt="<?php echo $attributes['imageAlt'] ?>" />
	<?php endif; ?>

	<div class="apcc-full-name py-1 px-2 mb-3 text-xl font-semibold border-0 border-b border-solid border-gray-300 rounded-lg"><?php echo $attributes['fullName'] ?></div>

	<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'Job title', 'ap-blocks' ) ?></span>
	<div class="apcc-job-title text-base m-0"><?php echo $attributes['jobTitle'] ?></div>

	<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'Email', 'ap-blocks' ) ?></span>
	<div class="apcc-email text-base m-0"><?php echo $attributes['email'] ?></div>

	<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'Workplace', 'ap-blocks' ) ?></span>
	<div class="apcc-workplace text-base m-0"><?php echo $workplaces[$attributes['workplace']] ?></div>

	<span class="apcc-label block mt-2 text-sm font-semibold text-gray-500"><?php echo __( 'About', 'ap-blocks' ) ?></span>
	<p class="apcc-description text-base m-0"><?php echo $attributes['description'] ?></p>
</div>