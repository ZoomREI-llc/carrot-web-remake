<?php
$selected_market = esc_html($attributes['selectedMarket']);
$image_url = esc_url(plugins_url('src/cb-home-we-help/assets/couple-' . strtolower(str_replace(' ', '-', $selected_market)) . '.webp', dirname(__FILE__, 2)));

$satisfaction_url = esc_url(plugins_url('src/cb-home-we-help/assets/satisfaction.webp', dirname(__FILE__, 2)));
?>

<section class="cb-home-we-help__container">
    <div class="cb-home-we-help">
        <div class="cb-home-we-help__image">
            <img
                src="<?php echo $image_url; ?>"
                alt="We’re Here" />
        </div>
        <div class="cb-home-we-help__text">
            <h2>We’re Here to Help!</h2>
            <p>
                <strong>We do our best to help people</strong>, whether in our
                community or in our business. We can help you move, we can help you
                find a new place to live in, and we can do a lot more to provide a
                truly hassle-free solution for selling your home.
            </p>
            <div class="cb-home-we-help-satisfaction">
                <p class="">
                    Now, please keep in mind that we are not a good fit for everyone,
                    but even then – we promise to guide you and advise you through the
                    best solution for YOU!
                </p>
                <?php if ($selected_market == 'stl') : ?>
                    <img
                        src="<?php echo $satisfaction_url; ?>"
                        alt="Satisfaction Guarantee" />

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>