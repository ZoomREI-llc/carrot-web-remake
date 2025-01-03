<?php
$company_name_short = get_blog_option(get_current_blog_id(), 'company_name_short', '') ?: 'Chris';
$image_url = ($company_name_short === 'Chris') ? 'cwu-meet-company/chris-buys' : 'cwu-meet-company/john-buys';
?>

<section id='about' class="cwu-meet-company inter-font">
    <div class="grid-container">
        <div class="cwu-meet-company__content">
            <div class="cwu-meet-company__text">
                <span class="pre-title">Hi, I'm [company_short]!</span>
                <h2 class="title-2">Got A House You Need To Sell In [market_city], [market_state]?</h2>
                <h3 class="sub-title">Let me help! We are genuine homebuyers, and we buy ANY house!</h3>
                <div class="cwu-meet-company__description">
                    <p>It might be that you’ve inherited a house, are behind on payments, don’t want to spend money on repairs, or need to relocate in a hurry. Whatever your circumstance or whatever state your home is in – it doesn’t matter to us. <strong>We’ll buy it, and fast!</strong></p>
                    <p>All this, <strong>without the hassle.</strong> No real estate agents. No inspections. No repairs or cleaning. Plus, we always make you a fair offer and pay the closing costs ourselves.</p>
                </div>
                <span class="title-4">Ready to sell your house right now?</span>
            </div>
            <div class="cwu-meet-company__footer-block">
                <a class="cwu-meet-company__cta green-btn green-btn--arrow cta-btn" href="<?= get_offer_button_link() ?>">Get my offer</a>
                <div class="cwu-hero__reviews">
                    <div class="cwu-hero__reviews-stars-wrapper">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-meet-company/star', 'star'); ?></span>
                        <?php endfor; ?>
                    </div>
                    <div class="cwu-hero__reviews-text">
                        <p>Rated <strong>4.7/5</strong> Based on <strong>100+</strong> reviews</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cwu-meet-company__media">
            <?php echo get_responsive_image('cwu-meet-company/meet-cris-fon', 'image fon', 'cwu-meet-company__media--fon'); ?>
        </div>
    </div>
</section>