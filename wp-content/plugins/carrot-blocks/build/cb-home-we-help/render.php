<?php
$selected_market = esc_html($attributes['selectedMarket']);
$image_url = 'cb-home-we-help/couple-' . strtolower(str_replace(' ', '-', $selected_market));
?>

<section class="cb-home-we-help__container" <?= in_array($selected_market, ['ind', 'cle', 'det']) ? 'style="padding-block: 0;"' : ''; ?>>
    <div class="cb-home-we-help">
        <div class="cb-home-we-help__image">
            <?php echo get_responsive_image($image_url, 'We’re Here'); ?>
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
            </div>
        </div>
    </div>
</section>