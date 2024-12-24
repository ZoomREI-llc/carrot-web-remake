<?php

$logoUrl = strtolower("cwu-service/".get_blog_option(get_current_blog_id(), 'market_code', '')."-favicon");
?>

<section id='compare' class="cwu-service inter-font">
    <div class="grid-container">
        <div class="cwu-service__header">
            <div class="pre-title">OUR SERVICE VS. REALTORS</div>
            <div class="title-2">
                <h2>See How We Compare</h2>
            </div>
            <p class="sub-title">Pick us over a real estate agent because:</p>
        </div>
        <div class="cwu-service__table">
            <div class="cwu-service__row cwu-service__row--header">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text"></div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image($logoUrl, 'logo', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">Selling with [company]</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <div class="cwu-service__row--text">Selling with a Real Estate Agent</div>
                </div>
            </div>
    
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Commissions / Fees</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">NONE</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">The seller (you) pays 6% on average</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Closings Costs</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">NONE - We pay them all</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">The seller (you) pays 2% on average</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Inspections / Financing</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">NONE</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">Yes. Around 15% of sales fall through</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Repairs</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text"> NO - We make a cash offer</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">Negotiated after inspection</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Average Days Until Sold</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">Immediate cash offer</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">91 days on average</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Number Of Showings</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">1 - Just us</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">No upper limit</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Closing Date</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">When ever you choose</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">On average, 30-60 days after offer</div>
                </div>
            </div>
            <div class="cwu-service__row">
                <div class="cwu-service__row--left-item">
                    <div class="cwu-service__row--text">Appraisal Required</div>
                </div>
                <div class="cwu-service__row--centr-item">
                    <?php echo get_responsive_image('cwu-service/icon-ok', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">NONE - We pay for them</div>
                </div>
                <div class="cwu-service__row--right-item">
                    <?php echo get_responsive_image('cwu-service/icon-not', 'Icon', 'cwu-service__row--icon'); ?>
                    <div class="cwu-service__row--text">Yes. Most sales are subject to an appraisal.</div>
                </div>
            </div>
        </div>
        <div class="cwu-service__footer">
            <h3 class="title-4">Ready to sell your house to us?</h3>
            <div class="cwu-service__footer-block">
                <a class="cwu-service__cta cta-btn green-btn green-btn--arrow" href="<?= get_offer_button_link() ?>">Get my offer</a>
                <div class="cwu-hero__reviews">
                    <div class="cwu-hero__reviews-stars-wrapper">
                        <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-service/star', 'star'); ?></span>
                        <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-service/star', 'star'); ?></span>
                        <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-service/star', 'star'); ?></span>
                        <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-service/star', 'star'); ?></span>
                        <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-service/star', 'star'); ?></span>
                    </div>
                    <div class="cwu-hero__reviews-text">
                        <p>Rated <strong>4.7/5</strong> Based on <strong>100+</strong> reviews</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>