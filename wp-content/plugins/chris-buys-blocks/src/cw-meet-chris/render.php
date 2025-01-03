<?php
$selectedMarket = isset($attributes['selectedMarket']) ? esc_html($attributes['selectedMarket']) : 'St. Louis, Missouri';

// Determine the name based on the selected market
if ($selectedMarket === "the Bay Area") {
    $selectedName = "John";
} else {
    $selectedName = "Chris";
}

$chris_url = 'cw-meet-chris/meet-cris-foto';
$john_url = 'cw-meet-chris/meet-john-foto';

// Choose the correct image based on the selected name
$image_url = ($selectedName === 'Chris') ? $chris_url : $john_url;
?>

<section id='about' class="cw-meet-chris inter-font">
    <div class="grid-container">
        <div class="cw-meet-chris__content">
            <div class="cw-meet-chris__text">
                <span class="pre-title">Hi, I'm <?php echo esc_html($selectedName); ?>!</span>
                <h2 class="title-2">Got A House You Need To Sell In <?php echo esc_html($selectedMarket); ?>?</h2>
                <h3 class="sub-title">Let me help! We are genuine homebuyers, and we buy ANY house!</h3>
                <div class="cw-meet-chris__description">
                    <p>It might be that you’ve inherited a house, are behind on payments, don’t want to spend money on repairs, or need to relocate in a hurry. Whatever your circumstance or whatever state your home is in – it doesn’t matter to us. <strong>We’ll buy it, and fast!</strong></p>
                    <p>All this, <strong>without the hassle.</strong> No real estate agents. No inspections. No repairs or cleaning. Plus, we always make you a fair offer and pay the closing costs ourselves.</p>
                </div>
                <span class="title-4">Ready to sell your house right now?</span>
            </div>
            <div class="cw-meet-chris__footer-block">
                <a class="cw-meet-chris__cta green-btn green-btn--arrow cta-btn" href="<?= get_offer_button_link() ?>">Get my offer</a>
                <div class="cw-hero__reviews">
                    <div class="cw-hero__reviews-stars-wrapper">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <span class="cw-hero__star"><?php echo get_responsive_image('cw-meet-chris/star', 'star'); ?></span>
                        <?php endfor; ?>
                    </div>
                    <div class="cw-hero__reviews-text">
                        <p>Rated <strong>4.7/5</strong> Based on <strong>100+</strong> reviews</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cw-meet-chris__media">
            <?php echo get_responsive_image('cw-meet-chris/meet-cris-fon', 'image fon', 'cw-meet-chris__media--fon'); ?>
            <div class="cw-meet-chris__photo">
                <?php echo get_responsive_image($image_url, esc_attr($selectedName)); ?>
            </div>
        </div>
    </div>
</section>