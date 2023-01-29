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
	register_block_type( __DIR__ . '/build/contact-card' );
}
add_action( 'init', 'apblk_register_blocks' );

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