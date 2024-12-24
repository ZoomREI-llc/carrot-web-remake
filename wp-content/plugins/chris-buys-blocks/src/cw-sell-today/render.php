<?php
$selectedName = isset($attributes['selectedName']) ? $attributes['selectedName'] : 'Chris';
?>
<section class="cw-sell-today inter-font">
    <div class="grid-container">
        <div class=" cw-hero__content">
            <div class="cw-hero__titles">
                <div class="pre-title">SELL YOUR HOUSE TODAY</div>
                <h2 class="title-2">We Make It Incredibly Easy To Sell Your House For Cash</h2>
                <p>Whatever your circumstances, no matter the condition of your house, we’re happy to buy. Contact us today for an immediate cash offer, and let’s get that house sold!</p>
            </div>
  
            <div class="cw-hero__footer-block">
               <a class="cw-service__cta green-btn green-btn--arrow cta-btn" href="<?= get_offer_button_link() ?>">Get my offer</a>
               <div class="cw-hero__reviews">
                   <div class="cw-hero__reviews-stars-wrapper">
                       <span class="cw-hero__star"><?php echo get_responsive_image('cw-sell-today/star', 'star'); ?></span>
                       <span class="cw-hero__star"><?php echo get_responsive_image('cw-sell-today/star', 'star'); ?></span>
                       <span class="cw-hero__star"><?php echo get_responsive_image('cw-sell-today/star', 'star'); ?></span>
                       <span class="cw-hero__star"><?php echo get_responsive_image('cw-sell-today/star', 'star'); ?></span>
                       <span class="cw-hero__star"><?php echo get_responsive_image('cw-sell-today/star', 'star'); ?></span>
                   </div>
                   <div class="cw-hero__reviews-text">
                       <p>Rated <strong>4.7/5</strong> Based on <strong>100+</strong> reviews</p>
                   </div>
               </div>
            </div>


            <ul class="cw-hero__statistic--list">
                <li class="cw-hero__statistic--item">
                    <div class="cw-hero__statistic--amunt">$36M+</div>
                    <div class="cw-hero__statistic--text">Saved <br>Fees</div>
                </li>
                <li class="cw-hero__statistic--item">
                    <div class="cw-hero__statistic--amunt">1,500+</div>
                    <div class="cw-hero__statistic--text">HOUSES <br>BOUGHT</div>
                </li>
                <li class="cw-hero__statistic--item">
                    <div class="cw-hero__statistic--amunt">96%</div>
                    <div class="cw-hero__statistic--text">SATISFIED <br>CUSTOMERS</div>
                </li>
            </ul>
        </div>
        <div class="cw-sell-today__media">
            <div class="cw-sell-today__bg">
                <?php echo get_responsive_image('cw-sell-today/last-block-fon', 'Leigh Williams'); ?>
            </div>
            <div class="cw-sell-today__photo">
                <?php echo get_responsive_image('cw-sell-today/'.strtolower($selectedName), esc_attr($selectedName)); ?>
            </div>
        </div>
    </div>
</section>