<?php
$primary_colors = [
    'sf'  => '#006cbf',
    'stl' => '#006cbf',
    'kc'  => '#ff651e',
    'det' => '#006cbf',
    'cle' => '#006cbf',
    'ind' => '#00768e',
];

$primary_dark_colors = [
    'sf'  => '#004173',
    'stl' => '#004173',
    'kc'  => '#d14200',
    'det' => '#004173',
    'cle' => '#004173',
    'ind' => '#003642',
];

$gradients = [
    'sf'  => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'stl' => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'kc'  => 'linear-gradient(-90deg, rgba(153, 68, 29, 0.6), rgba(153, 118, 29, 0.6));',
    'det' => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'cle' => 'linear-gradient(-90deg, rgba(13, 72, 118, 0.6), rgba(13, 29, 118, 0.6));',
    'ind' => 'linear-gradient(-90deg, rgba(13, 77, 91, 0.6), rgba(13, 45, 91, 0.6));',
];

$selected_market = esc_html($attributes['selectedMarket']);

$primary_color = $primary_colors[$selected_market] ?? '#FFFFFF';
$primary_dark_color = $primary_dark_colors[$selected_market] ?? '#000000';
$hero_gradient = $gradients[$selected_market] ?? 'linear-gradient(45deg, #FFFFFF, #EEEEEE)';
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

$background_image_url = esc_url(plugins_url('src/cb-home-hero/assets/background-' . $selected_market . '.webp', dirname(__FILE__, 2)));
$carrot_hero_url = esc_url(plugins_url('src/cb-home-hero/assets/carrot-hero.webp', dirname(__FILE__, 2)));
$bbb_url = esc_url(plugins_url('src/cb-home-hero/assets/bbb.svg', dirname(__FILE__, 2)));
?>

<style>
    :root {
        --primary-color: <?php echo esc_attr($primary_color); ?>;
        --primary-dark-color: <?php echo esc_attr($primary_dark_color); ?>;
        --dark-color: #212529;
        --hero-gradient: <?php echo esc_attr($hero_gradient); ?>;
        --background-image: url('<?php echo $background_image_url; ?>');

        <?php
        // Set '--show-select' for 'ind', 'cle', and 'det' markets
        if (in_array($selected_market, ['ind', 'cle', 'det'])) {
            echo '--show-select: none;';
        }

        // Set '--set-bbb-logo-width' for 'sf' market
        if ($selected_market === 'sf') {
            echo '--set-bbb-logo-width: 68px;';
            echo '--set-h3-font-weight: 700;';
        }

        // Set '--set-custom-form-field-flex' for 'sf', 'stl', 'cle', and 'det' markets
        if (in_array($selected_market, ['sf', 'stl', 'cle', 'det'])) {
            echo '--set-custom-form-field-flex: 0 0 100%;';
            echo '--set-custom-form-field-width: 100%;';
        }
        ?>
    }
</style>

<section class="cb-home-hero-wrapper">
    <svg class="cb-home-hero__triangle top" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 100,0 0,100" />
    </svg>

    <div class="cb-home-hero">
        <div class="cb-home-hero__top">
            <div class="cb-home-hero__call-us">
                Call Us! <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
            </div>
            <div class="cb-home-hero__links">
                <?php if ($selected_market === 'kc'): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer/">Get A Cash Offer Today</a>

                <?php elseif (in_array($selected_market, ['stl', 'sf'])): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer/">Get A Cash Offer in 7 Minutes</a>

                <?php elseif ($selected_market === 'ind'): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer/">Get A Cash Offer in 7 Minutes</a>
                    <a href="<?php echo site_url() ?>/our-company/">Our Company</a>

                <?php elseif (in_array($selected_market, ['cle', 'det'])): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer/">Get Your Cash Offer</a>
                    <a href="<?php echo site_url() ?>/contact-us/">Contact Us</a>

                <?php endif; ?>
            </div>

        </div>

        <div class="cb-home-hero__content">
            <img
                class="cb-home-hero__headline-image"
                src="<?php echo esc_url($carrot_hero_url); ?>"
                alt="Sell Your Home Fast and Easy" />
            <img class="cb-home-hero__bbb-logo"
                src="<?php echo esc_url($bbb_url); ?>"
                alt="" />
            <h3>
                We buy houses in any condition. No realtors, no fees, no commissions,
                no repairs & not even cleaning.
            </h3>
            <div class="cb-home-hero__form-wrapper">
                <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
            </div>
        </div>
    </div>

    <svg class="cb-home-hero__triangle bottom" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,100 100,100 100,0" />
    </svg>
</section>