<?php

$phone_img = plugins_url('src/faq-form/assets/phone.svg', dirname(__FILE__, 2));


$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
?>

<section class="faq-form body-gray" style="--tick-url: url('<?php echo get_image_url('faq-form/tick'); ?>');">
    <div class="grid-container">
        <div class="faq-form__container">
            <div class="faq-form-title title-2"><h2>Ready to sell your house As-Is with no hassle?</h2></div>
            <div class="faq-form-description"><h3>Get an offer on your house from a trusted buyer in minutes.</h3></div>
            <a href="tel:<?php echo $phoneNumber; ?>" class="faq-form-number">
                <div class="faq-form-number__img">
                    <?php echo get_responsive_image('faq-form/phone', 'phone'); ?>
                </div>
                <div class="faq-form-number__text"><span><?php echo $phoneNumber; ?></span></div>
            </a>

            <div class="faq-form-main">
                <div class="faq-form-wrap hide-on-success" data-form-name="Contact Inquiry">
                    <div class="faq-form-main__title">
                        <h3>Prefer to write? Send us a message here.</h3>
                    </div>
            
                    <?= $content; ?>
                </div>
                <div class="show-on-success">
                    <div class="contact-form__success">
                        <h3>Thank you for submitting your inquiry.</h3>
                        <p>We will get in touch with you as soon as we can.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
