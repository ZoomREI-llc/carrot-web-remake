<?php
$gradients = [
    'sf'  => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'stl' => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'kc'  => 'linear-gradient(-90deg, rgba(153, 68, 29, 0.6), rgba(153, 118, 29, 0.6));',
    'det' => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'cle' => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'ind' => 'linear-gradient(-90deg, rgba(13, 77, 91, 0.6), rgba(13, 45, 91, 0.6));',
];

$marketNames = [
    'sf'  => 'any condition',
    'stl' => 'St. Louis',
    'kc'  => 'Kansas City',
    'det' => 'Metro Detroit',
    'cle' => 'Cleveland, MI',
    'ind' => 'Indianapolis',
];

$selected_market = esc_html($attributes['selectedMarket']);
$marketName = esc_html($marketNames[$selected_market]) ?? 'any condition';

$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$hero_gradient = $gradients[$selected_market] ?? 'linear-gradient(45deg, #FFFFFF, #EEEEEE)';
$background_image_url = esc_url(plugins_url('src/cb-hiw-hero/assets/background-' . $selected_market . '.webp', dirname(__FILE__, 2)));
$carrot_hero_url = esc_url(plugins_url('src/cb-hiw-hero/assets/carrot-hero.webp', dirname(__FILE__, 2)));
?>

<style>
    :root {
        --hero-gradient: <?php echo esc_attr($hero_gradient); ?>;
        --background-image: url('<?php echo $background_image_url; ?>');
    }
</style>

<section class="cb-hiw-hero-wrapper">
    <svg class="cb-hiw-hero__triangle top" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 100,0 0,100" />
    </svg>

    <div class="cb-hiw-hero">
        <div class="cb-hiw-hero__top">
            <div class="cb-hiw-hero__call-us">
                Call Us! <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
            </div>
            <a href="<?php echo site_url() ?>/get-a-cash-offer/" class="cb-hiw-hero__top--nav-link">Get A Cash Offer Today</a>
        </div>

        <div class="cb-hiw-hero__content">
            <img
                class="cb-hiw-hero__headline-image"
                src="<?php echo esc_url($carrot_hero_url); ?>"
                alt="Sell Your Home Fast and Easy" />
            <h3>
                We pay cash for houses in <?php echo $marketName; ?>. No realtors, no fees, no commissions, no repairs & don’t even clean. <strong>Get Your No-Obligation All Cash Offer Started Below!</strong>
            </h3>
        </div>
    </div>

    <svg class="cb-hiw-hero__triangle bottom" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,100 100,100 100,0" />
    </svg>
</section>