<?php

/**
 * Plugin Name:       Chris Buys Blocks
 * Description:       Custom blocks package developed for the Chris Buys Homes Website.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Omri Ashkenazi
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       chris-buys-blocks
 *
 * @package ChrisBuysBlocks
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function chris_buys_blocks_chris_buys_blocks_block_init()
{
	$blocks = [
		'cw-number-one',
		'cw-header',
		'cw-blockquote',
		'cw-service',
		'cw-sell-today',
		'cw-hero',
		'cw-virtue-carousel',
		'cw-as-seen-on-carousel',
		'cw-steps',
		'cw-meet-chris',
		'cw-fresh-start',
		'cw-why-choose-us',
		'cw-guarantee',
		'cw-testimonials',
		'cw-property-management',
		'cw-faqs',
		'cw-cta',
		'cw-footer',

		'lc-header',
		'lc-hero',
		'lc-virtue-carousel',
		'lc-steps',
		'lc-meet-chris',
		'lc-fresh-start',
		'lc-why-choose-us',
		'lc-guarantee',
		'lc-testimonials',
		'lc-faqs',
		'lc-cta',
		'lc-number-one',
		'cw-footer-v2',

		'ao-header',
		'ao-hero',
		'ao-virtue-carousel',
		'ao-as-seen-on-carousel',
		'ao-steps',
		'ao-meet-chris',
		'ao-fresh-start',
		'ao-why-choose-us',
		'ao-guarantee',
		'ao-testimonials',
		'ao-property-management',
		'ao-faqs',
		'ao-cta',

		's2-header',
		's2-form-cw',
		's2-form-nhp',
		's2-as-seen-on-carousel',

		'cw-hero-v2',
		'cw-hero-dynamic', //namespace prefix issue

		'lead-form',
		'lead-form-compact',
		'lead-form-consent',
		'lead-form-contact',
		'form-step-2',

		'exit-popup',
		'nhp-exit-popup',

		'cookie-banner',
		'cookie-banner-consent', //namespace prefix issue
        
        
        // CWU Blocks
        'benefits',
		'blog',
		'blog-categories',
		'blog-category',
		'blog-category-hero',
		'blog-hero',
		'blog-latest',
		'blog-post-banner',
		'cwu-as-seen-on-carousel',
		'cwu-blockquote',
		'cwu-faqs',
		'cwu-hero-v2',
		'cwu-meet-company',
		'cwu-sell-today',
		'cwu-service',
		'cwu-steps',
		'cwu-testimonials',
		'cwu-why-choose-us',
		'faq-accordions',
		'faq-form',
		'post-banner'
	];

	foreach ($blocks as $block) {
		register_block_type(__DIR__ . "/build/$block");
		add_shortcode("chris_buys_blocks_$block", function ($atts) use ($block) {
			$attributes = shortcode_atts([], $atts);
			return render_block([
				'blockName' => "chris-buys/$block",
				'attrs' => $attributes,
			]);
		});
	}
}
add_action('init', 'chris_buys_blocks_chris_buys_blocks_block_init');

add_action('wp_enqueue_scripts', function () {
    wp_register_script('doctor-homes-inline', '', [], false, false);
    
    $loadScripts = file_get_contents(__DIR__ . '/utils/loadScript.js');
    
    if ($loadScripts !== false) {
        wp_add_inline_script('doctor-homes-inline', $loadScripts);
    }
    
    wp_enqueue_script('doctor-homes-inline');
    wp_enqueue_script('form-engine', plugin_dir_url(__FILE__) . 'includes/form-engine/script.js');
    
    add_filter('script_loader_tag', function($tag, $handle) {
        if ('form-engine' === $handle) {
            $tag = str_replace('<script ', '<script type="module" ', $tag);
        }
        return $tag;
    }, 10, 2);
}, 0);

add_filter('should_load_separate_core_block_assets', '__return_true');

include_once plugin_dir_path(__FILE__) . 'includes/image-helper.php';
include_once plugin_dir_path(__FILE__) . 'includes/form-engine/handler.php';
