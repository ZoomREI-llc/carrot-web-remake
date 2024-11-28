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
    'sf'  => 'https://seal-goldengate.bbb.org/frame/blue-seal-150-110-whitetxt-bbb-890496.png?chk=37C5297039',
    'stl' => 'https://seal-stlouis.bbb.org/frame/blue-seal-150-110-whitetxt-bbb-1000021855.png?chk=DFD528B2C1',
    'kc'  => 'https://seal-nebraska.bbb.org/frame/blue-seal-150-110-whitetxt-bbb-1000050344.png?chk=CF9CF3FF1D',
    'det' => 'https://seal-easternmichigan.bbb.org/frame/blue-seal-150-110-whitetxt-bbb-90043256.png?chk=79304931E1',
    'cle' => '',
    'ind' => 'https://seal-indy.bbb.org/frame/blue-seal-150-110-whitetxt-bbb-90038382.png?chk=780BF3031C',
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
        // // Set '--show-select' for 'ind', 'cle', and 'det' markets
        // if (in_array($selected_market, ['ind', 'cle', 'det'])) {
        //     echo '--show-select: none;';
        // }

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
            <?php
            if ($selected_market == 'cle') {
                echo cb_get_responsive_image('cb-home-hero/bbb', 'Logo', 'bbb-logo');
            } else {
                echo '<iframe border="0" frameborder="0" style="border: 0; height:110px; width:150px;" src="' . esc_url($bbb) . '"></iframe>';
            }
            ?>
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