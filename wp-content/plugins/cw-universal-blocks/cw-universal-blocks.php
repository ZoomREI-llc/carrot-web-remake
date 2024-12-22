<?php

/**
 * Plugin Name:       CW Universal Blocks
 * Description:       Custom blocks package developed for the CW Universal Plugin.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Omri Ashkenazi
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cw-universal-blocks
 *
 * @package CWUniversalBlocks
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

// Include form handler
function cw_universal_blocks_cw_universal_blocks_block_init()
{
	$blocks = [
        'blog',
        'blog-hero',
		'blog-latest',
		'blog-post-banner',
		'blog-categories',

		'blog-category-hero',
		'blog-category',
        
        'post-banner',
    ];

	foreach ($blocks as $block) {
		register_block_type(__DIR__ . "/build/$block");
		add_shortcode("cw_universal_$block", function ($atts) use ($block) {
			$attributes = shortcode_atts([], $atts);
			return render_block([
				'blockName' => "cw-universal/$block",
				'attrs' => $attributes,
			]);
		});
	}
}

add_action('init', 'cw_universal_blocks_cw_universal_blocks_block_init');

add_action('wp_enqueue_scripts', function () {
	wp_register_script('cw-universal-inline', '', [], false, false);

	$loadScripts = file_get_contents(__DIR__ . '/utils/loadScript.js');

	if ($loadScripts !== false) {
		wp_add_inline_script('cw-universal-inline', $loadScripts);
	}
    
	wp_enqueue_script('cw-universal-inline');
	wp_enqueue_script('form-engine', plugin_dir_url(__FILE__) . 'includes/form-engine/script.js');

	add_filter('script_loader_tag', function ($tag, $handle) {
		if ('form-engine' === $handle) {
			$tag = str_replace('<script ', '<script type="module" ', $tag);
		}
		return $tag;
	}, 10, 2);
    
    if (is_page()) {
        $post_id = get_the_ID();
        $market_code = get_post_meta($post_id, '_market_code', true);

        if ($market_code) {
            $script = 'window.marketCode = "' . esc_js($market_code) . '";';
            wp_add_inline_script('cw-universal-inline', $script);
        }
    }
}, 0);

function add_market_code_metabox() {
    add_meta_box(
        'market_code_metabox',
        'Market Code',
        'render_market_code_metabox',
        'page',
        'side'
    );
}
add_action('add_meta_boxes', 'add_market_code_metabox');

function render_market_code_metabox($post) {
    $market_code = get_post_meta($post->ID, '_market_code', true);
    
    wp_nonce_field('market_code_nonce_action', 'market_code_nonce');
    
    echo '<style>.postbox-header .handle-actions{flex-direction: row;display: flex;padding: 12px 10px;}.edit-post-meta-boxes-area .postbox .handle-order-higher, .edit-post-meta-boxes-area .postbox .handle-order-lower {width: 20px;height: 20px;padding: 0 !important;}</style>';
    echo '<label for="market_code_field">Market Code:</label>';
    echo '<input type="text" id="market_code_field" name="market_code_field" value="' . esc_attr($market_code) . '" style="width:100%;">';
}

function save_market_code_metabox($post_id) {
    if (!isset($_POST['market_code_nonce']) || !wp_verify_nonce($_POST['market_code_nonce'], 'market_code_nonce_action')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['market_code_field'])) {
        update_post_meta($post_id, '_market_code', sanitize_text_field($_POST['market_code_field']));
    }
}
add_action('save_post', 'save_market_code_metabox');

add_filter('should_load_separate_core_block_assets', '__return_true');

require_once plugin_dir_path(__FILE__) . 'includes/form-engine/handler.php';
include_once plugin_dir_path(__FILE__) . 'includes/image-helper.php';
