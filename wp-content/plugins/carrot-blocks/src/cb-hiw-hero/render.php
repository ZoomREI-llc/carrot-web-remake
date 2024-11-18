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
$background_image_url = 'cb-hiw-hero/background-' . $selected_market;
?>

<style>
    :root {
        --hero-gradient: <?php echo esc_attr($hero_gradient); ?>;
        
        --background-image-small: url('<?php echo get_image_url($background_image_url, 768); ?>');
        --background-image-medium: url('<?php echo get_image_url($background_image_url, 1024); ?>');
        --background-image-large: url('<?php echo get_image_url($background_image_url, 2048); ?>');
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
            <a href="<?php echo site_url() ?>/get-a-cash-offer-today/" class="cb-hiw-hero__top--nav-link">Get A Cash Offer Today</a>
        </div>

        <div class="cb-hiw-hero__content">
            <?php echo get_responsive_image('cb-hiw-hero/carrot-hero', 'Sell Your Home Fast and Easy', 'cb-hiw-hero__headline-image'); ?>
            <h3>
                We pay cash for houses in <?php echo $marketName; ?>. No realtors, no fees, no commissions, no repairs & don’t even clean. <strong>Get Your No-Obligation All Cash Offer Started Below!</strong>
            </h3>
        </div>
    </div>

    <svg class="cb-hiw-hero__triangle bottom" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,100 100,100 100,0" />
    </svg>
</section>