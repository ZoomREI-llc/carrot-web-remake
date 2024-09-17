<?php


$selected_market = esc_html($attributes['selectedMarket']);

$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
$cityName = isset($attributes['cityName']) ? esc_html($attributes['cityName']) : '';
$streetName = isset($attributes['streetName']) ? esc_html($attributes['streetName']) : '';

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

?>


<section class="cb-contact-page-contacts-wrapper">
    <div class="cb-contact-page-contacts">
        <div class="cb-contact-page-contacts__info">
            <h2>Contact Info:</h2>
            <p class="cb-contact-page-contacts__info--market">Chris Buys Homes in <?php echo $selected_market; ?></p>
            <p class="cb-contact-page-contacts__info--city"><?php echo $cityName; ?></p>
            <p class="cb-contact-page-contacts__info--street"><?php echo $streetName; ?></p>
            <p class="cb-contact-page-contacts__info--phone">
               <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
            </p>
        </div>
        <div class="cb-contact-page-contacts__form-conteiner">
              <span class="cb-contact-page-contacts__form-description">We would love to hear from you! Please fill out this form and we will get in touch with you shortly.</span>
              <div class="cb-contact-page-contacts__form-wrapper">
                <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
              </div>
        </div>
    </div>
</section>