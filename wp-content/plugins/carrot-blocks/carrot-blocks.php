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
		'cb-popup-contact-form',
		'cb-popup-link-get-a-cash-offer',
		'cb-faqs-page',
		'cb-faqs-page-hero',
		'cb-syh-page-what-are-the-benefits',
		'cb-syh-page-no-risk',
		'cb-syh-page-need-to-sell',
		'cb-syh-page-chris-reviews',
		'cb-syh-page-hero-sell-your-house',
		'cb-syh-page-hero-get-a-cash-offer',
		'cb-syh-page-google-reviews',
		'cb-oc-page-hero',
		'cb-oc-page-our-mission',
		'cb-oc-page-how-do-we-work',
		'cb-oc-page-about',
		'cb-oc-page-call-us',
		'cb-oc-page-google-reviews',
		'cb-oc-page-reputable',
		'cb-oc-page-care-values',
		'cb-oc-page-we-became-real-estate-investors',
		'cb-contact-page-hero',
		'cb-contact-page-conect-with-us',
		'cb-contact-page-contacts',
		'cb-contact-page-conect-open-to-communication',
		'cb-hiw-hero',
		'cb-hiw-how-do-we-now-forward',
		'cb-hiw-congrats',
		'cb-hiw-whast-next',
		'cb-hiw-are-you-ready-to-get-cash',
		'cb-hiw-make-an-offer-on-a-home',
		'cb-hiw-how-do-i-sell',
		'cb-hiw-google-reviews',
		'cb-hiw-want-to-sell',
		'cb-home-hero',
		'cb-home-we-buy-houses',
		'cb-home-never-lowball',	
		'cb-home-google-reviews',		
		'cb-home-we-can-help',	
		'cb-home-home-buyer',		
		'cb-home-we-help',		
		'cb-home-no-inspectors',		
		'cb-home-how-to',
		'cb-home-local-company',		
		'cb-home-fast-cash-offer',		
		'cb-home-no-obligation',		
		'cb-home-commercial',		
		'cb-home-as-is',
		'cb-home-reviews',
		'cb-home-new-and-easy',
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
