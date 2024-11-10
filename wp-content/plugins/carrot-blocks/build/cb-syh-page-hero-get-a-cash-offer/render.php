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
$fullNameMarket = [
    'sf'  => 'San Francisco',
    'stl' => 'St. Louis',
    'kc'  => 'Kansas City',
    'det' => 'Detroit;',
    'cle' => 'Cleveland;',
    'ind' => 'Indianapolis',
];

$selected_market = esc_html($attributes['selectedMarket']);

$primary_color = $primary_colors[$selected_market] ?? '#FFFFFF';
$primary_dark_color = $primary_dark_colors[$selected_market] ?? '#000000';
$hero_gradient = $gradients[$selected_market] ?? 'linear-gradient(45deg, #FFFFFF, #EEEEEE)';
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

$background_image_url = esc_url(plugins_url('src/cb-syh-page-hero-get-a-cash-offer/assets/background-' . $selected_market . '.webp', dirname(__FILE__, 2)));
$carrot_hero_url = esc_url(plugins_url('src/cb-syh-page-hero-get-a-cash-offer/assets/carrot-hero.webp', dirname(__FILE__, 2)));

$market_name = $fullNameMarket[$selected_market] ?? 'Kansas City' ;

$carrot_step1_url = esc_url(plugins_url('src/cb-syh-page-hero-get-a-cash-offer/assets/step1.webp', dirname(__FILE__, 2)));
$carrot_step2_url = esc_url(plugins_url('src/cb-syh-page-hero-get-a-cash-offer/assets/step2.webp', dirname(__FILE__, 2)));
$carrot_step3_url = esc_url(plugins_url('src/cb-syh-page-hero-get-a-cash-offer/assets/step3.webp', dirname(__FILE__, 2)));
?>

<style>
    :root {
        --primary-color: <?php echo esc_attr($primary_color); ?>;
        --primary-dark-color: <?php echo esc_attr($primary_dark_color); ?>;
        --dark-color: #212529;
        --hero-gradient: <?php echo esc_attr($hero_gradient); ?>;
        --background-image: url('<?php echo $background_image_url; ?>');
    }
</style>

<section class="cb-syh-page-hero-get-a-cash-offer-section">
    <div class="cb-syh-page-hero-get-a-cash-offer-wrapper">
         <svg class="cb-syh-page-hero-get-a-cash-offer__triangle top" viewBox="0 0 100 100" preserveAspectRatio="none">
             <polygon points="0,0 100,0 0,100" />
         </svg>
         <div class="cb-syh-page-hero-get-a-cash-offer">
             <div class="cb-syh-page-hero-get-a-cash-offer__top">
                 <div class="cb-syh-page-hero-get-a-cash-offer__call-us">
                     Call Us! <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
                 </div>
                 <a href="/get-a-cash-offer-today/" class="cb-syh-page-hero-get-a-cash-offer__top--nav-link">Get A Cash Offer Today</a>
             </div>
         </div>
         <div class="cb-syh-page-hero-get-a-cash-offer__block-for-hight"></div>
         <svg class="cb-syh-page-hero-get-a-cash-offer__triangle bottom" viewBox="0 0 100 100" preserveAspectRatio="none">
             <polygon points="0,100 100,100 100,0" />
         </svg>
    </div>
    <div class="cb-syh-page-hero-get-a-cash-offer__content">
        <h1 class="">Get A Cash Offer in 7 Minutes</h1>
        <div class="cb-syh-page-hero-get-a-cash-offer__content--wrapper">
            <div class="cb-syh-page-hero-get-a-cash-offer__content--column-left">
                 <p class="">
                   <img  alt="step 1" src="<?php echo $carrot_step1_url; ?>">
                   <strong>Fill in the information in this form. You can also call us at <a href="tel:<?php echo $phoneNumber; ?>" style="color: #02bdfc"><?php echo $phoneNumber; ?></a> if you prefer.</strong>
                 </p>
                 <hr class="cb-syh-page-hero-get-a-cash-offer__content--separator">
                 <p class="">
                   <img  alt="step 2" src="<?php echo $carrot_step2_url; ?>">
                   <strong>We will then call you to talk about the house, and make you an offer. Don’t be surprised if we call you within a few minutes. 😊</strong>
                 </p>
                 <hr class="cb-syh-page-hero-get-a-cash-offer__content--separator">
                 <p class="">
                   <img alt="step 3" src="<?php echo $carrot_step3_url; ?>">
                   <strong>You choose a closing date when you will receive your cash.</strong>
                 </p>
            </div>
            <div class="cb-syh-page-hero-get-a-cash-offer__content--column-right">
               <div class="cb-syh-page-hero-get-a-cash-offer__content--column-right--heading">
                   <p class="">We buy houses in ANY CONDITION in <?php echo $market_name; ?>. There are no commissions or fees and no obligation whatsoever. For the fastest service, call us now <a href="tel:<?php echo $phoneNumber; ?>" style="color: #02bdfc"><?php echo $phoneNumber; ?></a></p>
               </div>
               <div class="cb-syh-page-hero-get-a-cash-offer__content--column-right--form-wrapper">
                  <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
               </div>
            </div>
        </div>    
    </div>
</section>