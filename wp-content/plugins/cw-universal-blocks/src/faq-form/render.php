<?php

$phone_img = plugins_url('src/faq-form/assets/phone.svg', dirname(__FILE__, 2));


$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
?>

<section class="faq-form" style="--tick-url: url('<?php echo cwu_get_image_url('faq-form/tick'); ?>');">
	<div class="faq-form-title title-2"><h2>Didn't find the answer you were looking for?</h2></div>
	<div class="faq-form-description"><h3>Give us a call--we're happy to help!</h3></div>
	<a href="tel:<?php echo $phoneNumber; ?>" class="faq-form-number">
		<div class="faq-form-number__img">
            <?php echo cwu_get_responsive_image('faq-form/phone', 'phone'); ?>
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
</section>
