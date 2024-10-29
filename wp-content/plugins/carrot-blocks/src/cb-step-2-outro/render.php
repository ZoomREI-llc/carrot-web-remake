<?php
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$carrot_privacy_url = esc_url(plugins_url('src/cb-step-2-outro/assets/privacy.webp', dirname(__FILE__, 2)));
?>

<section class="cb-step-2-outro-wrapper">
    <p>Or, if you’d rather… you can always call us and <span style="text-decoration: underline">chat with us over the phone anytime at <strong><a href="tel:<?php echo $phoneNumber ?> "><?php echo $phoneNumber ?></a></strong></span>. There’s never any hassle or obligation. We’ll tell you like it is. We truly love working with people who need a fast honest solution to a house that you need to get out from under.</p>
    <img src="<?php echo $carrot_privacy_url ?>" alt="privacy">
</section>