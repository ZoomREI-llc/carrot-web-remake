<?php
$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
?>

<section class="cb-step-2-intro-wrapper">
    <p class="cb-step-2-intro__step-2"><strong style="color: #bf4045; text-decoration: underline; font-weight: 700;">Step 2 of 2:</strong> Help Us With A Few More Bits Of Information…</p>
    <h1 class="wp-block-heading">Excellent! Now A Few More Questions<br>To Help Us Learn More About Your Property…</h1>
    <p class="cb-step-2-intro__5-min"><em>(it takes 5 minutes but will help us make our offer more quickly and more accurately. The more we have to go on the better the offer we can confidently make you.)</em></p>
    <p class="cb-step-2-intro__call"><strong>Or, if you’d rather, you can give us a call and we can go over this info over the phone at <a href="tel:<?php echo $phoneNumber ?> "><?php echo $phoneNumber ?></a>. Whichever way is easiest for you.</strong></p>
    <div class="cb-step-2-hero__form-wrapper">
        <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
    </div>
</section>