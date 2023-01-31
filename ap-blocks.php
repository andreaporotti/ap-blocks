<?php
/**
 * Plugin Name:       AP Blocks
 * Description:       A demo plugin containing multiple blocks.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Andrea Porotti
 * Author URI:        https://www.andreaporotti.it
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ap-blocks
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function apblk_register_blocks() {
	register_block_type( __DIR__ . '/build/block1' );
	register_block_type( __DIR__ . '/build/block2' );
	register_block_type( __DIR__ . '/build/contact-card', array(
		'render_callback' => 'apblk_contact_card_render_callback'
	) );
}
add_action( 'init', 'apblk_register_blocks' );

/**
 * Render callback for the "Contact Card" block.
 */
function apblk_contact_card_render_callback( $attr ) {
	//require_once __DIR__ . '/build/contact-card/include/template.php';

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

/**
 * Adds a custom block category.
 */
function apblk_add_block_category( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'ap-blocks',
                'title' => __( 'AP Blocks', 'ap-blocks' ),
                'icon'  => null,
            )
        );
    }
    return $block_categories;
}
add_filter( 'block_categories_all', 'apblk_add_block_category', 10, 2 );