<?php

/**
 * Plugin Name:       Carrot Blocks
 * Description:       Custom blocks package developed for the Carrot Website.
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
function carrot_blocks_carrot_blocks_block_init()
{
	$blocks = [
		'carrot-header',
		'carrot-hero',
		'cb-home-hero',
		'cb-hiw-hero',
		'we-buy-houses',
		'cb-hiw-how-do-i-sell',
		'cb-home-we-buy-houses',
		'cb-home-never-lowball',
		'never-lowball',
		'google-reviews',
		'cb-home-google-reviews',
		'cb-hiw-google-reviews',
		'cb-home-we-can-help',
		'we-can-help',
		'cb-home-home-buyer',
		'home-buyer',
		'we-help',
		'cb-home-we-help',
		'no-inspectors',
		'cb-home-no-inspectors',
		'how-to',
		'cb-home-how-to',
		'cb-home-local-company',
		'local-company',
		'cb-home-fast-cash-offer',
		'fast-cash-offer',
		'cb-home-no-obligation',
		'no-obligation',
		'cb-home-commercial',
		'commercial',
		'cb-home-as-is',
		'as-is',
		'cb-home-reviews',
		'reviews',
		'cb-hiw-want-to-sell',
		'cb-home-new-and-easy',
		'new-and-easy',
	];

	foreach ($blocks as $block) {
		register_block_type(__DIR__ . "/build/$block");
		add_shortcode("carrot_blocks_$block", function ($atts) use ($block) {
			$attributes = shortcode_atts([], $atts);
			return render_block([
				'blockName' => "carrot-buys/$block",
				'attrs' => $attributes,
			]);
		});
	}
}
add_action('init', 'carrot_blocks_carrot_blocks_block_init');
