<?php

$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

?>


<section class="cb-popup-contact-form__wrapper">
    <div class="cb-popup-contact-form__inner">
        <div class="cb-popup-contact-form__btn-close">
           <span class="cb-popup-contact-form__btn-close--icon" style="" title="Close" data-title="Close">×</span>
        </div>


            <h2 class='cb-popup-contact-form__title' style=""><strong style="">WAIT! BEFORE YOU GO</strong></h2>

            <p class='cb-popup-contact-form__text-after-title' style="">Did you know that you can get a fair cash offer in <strong >just 7 minutes over the phone?</strong></p>
            
            <div class="">
            <h3 class='cb-popup-contact-form__call-us' style=""><strong style="">Call US! <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a></strong></h3>
            <p class='cb-popup-contact-form__last-text' style="">or fill out the form and we'll call you :)</p>
            </div>
            
        <div class="cb-popup-contact-form__form">
              <div class="cb-popup-contact-form__form-wrapper">
                <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
              </div>
        </div>
    </div>
</section>