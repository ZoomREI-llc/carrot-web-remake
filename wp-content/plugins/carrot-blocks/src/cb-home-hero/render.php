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

$bbbs = [
    'sf' => '<a href="https://www.bbb.org/us/ca/walnut-creek/profile/real-estate-investing/john-buys-bay-area-houses-1116-890496/#sealclick" target="_blank" rel="nofollow"><img src="https://seal-goldengate.bbb.org/seals/blue-seal-150-110-whitetxt-bbb-890496.png" style="border: 0;" alt="John Buys Bay Area Houses BBB Business Review" /></a>',
    'stl' => '<a href="https://www.bbb.org/us/mo/st-louis/profile/real-estate-investing/chris-buys-homes-in-st-louis-1116-1000021855/#sealclick" target="_blank" rel="nofollow"><img src="https://seal-stlouis.bbb.org/seals/blue-seal-150-110-whitetxt-bbb-1000021855.png" style="border: 0;" alt="Chris Buys Homes in St. Louis BBB Business Review" /></a>',
    'kc' => '<a href="https://www.bbb.org/us/mo/kansas-city/profile/real-estate-investing/chris-buys-homes-in-kansas-city-1116-1000050344/#sealclick" target="_blank" rel="nofollow"><img src="https://seal-nebraska.bbb.org/seals/blue-seal-150-110-whitetxt-bbb-1000050344.png" style="border: 0;" alt="Chris Buys Homes in Kansas City BBB Business Review" /></a>',
    'det' => '<a href="https://www.bbb.org/us/mi/detroit/profile/real-estate-investing/chris-buys-homes-in-detroit-1116-90043256/#sealclick" target="_blank" rel="nofollow"><img src="https://seal-easternmichigan.bbb.org/seals/blue-seal-150-110-whitetxt-bbb-90043256.png" style="border: 0;" alt="Chris Buys Homes In Detroit BBB Business Review" /></a>',
    'cle' => '',
    'ind' => '<a href="https://www.bbb.org/us/in/indianapolis/profile/real-estate-investing/chris-buys-homes-in-indianapolis-1116-90038382/#sealclick" target="_blank" rel="nofollow"><img src="https://seal-indy.bbb.org/seals/blue-seal-150-110-whitetxt-bbb-90038382.png" style="border: 0;" alt="Chris Buys Homes in Indianapolis BBB Business Review" /></a>',
];

$selected_market = esc_html($attributes['selectedMarket']);

$primary_color = $primary_colors[$selected_market] ?? '#FFFFFF';
$primary_dark_color = $primary_dark_colors[$selected_market] ?? '#000000';
$hero_gradient = $gradients[$selected_market] ?? 'linear-gradient(45deg, #FFFFFF, #EEEEEE)';
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
$bbb = $bbbs[$selected_market] ?? '';

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

$background_image_url = 'cb-home-hero/background-' . $selected_market;
?>

<style>
    :root {
        --primary-color: <?php echo esc_attr($primary_color); ?>;
        --primary-dark-color: <?php echo esc_attr($primary_dark_color); ?>;
        --dark-color: #212529;
        --hero-gradient: <?php echo esc_attr($hero_gradient); ?>;

        --background-image-small: url('<?php echo cb_get_image_url($background_image_url, 768); ?>');
        --background-image-medium: url('<?php echo cb_get_image_url($background_image_url, 1024); ?>');
        --background-image-large: url('<?php echo cb_get_image_url($background_image_url, 2048); ?>');
        <?php
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
                    <a href="<?php echo site_url() ?>/get-a-cash-offer-today/">Get A Cash Offer Today</a>

                <?php elseif (in_array($selected_market, ['stl', 'sf'])): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer-today/">Get A Cash Offer in 7 Minutes</a>

                <?php elseif ($selected_market === 'ind'): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer-today/">Get A Cash Offer in 7 Minutes</a>
                    <a href="<?php echo site_url() ?>/our-company/">Our Company</a>

                <?php elseif (in_array($selected_market, ['cle', 'det'])): ?>
                    <a href="<?php echo site_url() ?>/get-a-cash-offer-today/">Get Your Cash Offer</a>
                    <a href="<?php echo site_url() ?>/contact-us/">Contact Us</a>

                <?php endif; ?>
            </div>

        </div>

        <div class="cb-home-hero__content">
            <?php echo cb_get_responsive_image('cb-home-hero/carrot-hero', 'Sell Your Home Fast and Easy', 'cb-home-hero__headline-image'); ?>
            <?php echo cb_get_responsive_image('cb-home-hero/bbb', 'Logo', 'bbb-logo'); ?>
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