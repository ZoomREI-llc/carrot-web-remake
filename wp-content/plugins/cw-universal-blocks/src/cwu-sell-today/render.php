<?php
$selectedName = isset($attributes['selectedName']) ? $attributes['selectedName'] : 'Chris';
?>
<section class="cwu-sell-today inter-font">
    <div class="grid-container">
        <div class=" cwu-hero__content">
            <div class="cwu-hero__titles">
                <div class="pre-title">SELL YOUR HOUSE TODAY</div>
                <h2 class="title-2">We Make It Incredibly Easy To Sell Your House For Cash</h2>
                <p>Whatever your circumstances, no matter the condition of your house, we’re happy to buy. Contact us today for an immediate cash offer, and let’s get that house sold!</p>
            </div>
  
            <div class="cwu-hero__footer-block">
               <a class="cwu-service__cta green-btn green-btn--arrow cta-btn" href="#cwu-form">Get my offer</a>
               <div class="cwu-hero__reviews">
                   <div class="cwu-hero__reviews-stars-wrapper">
                       <span class="cwu-hero__star"><?php echo cwu_get_responsive_image('cwu-sell-today/star', 'star'); ?></span>
                       <span class="cwu-hero__star"><?php echo cwu_get_responsive_image('cwu-sell-today/star', 'star'); ?></span>
                       <span class="cwu-hero__star"><?php echo cwu_get_responsive_image('cwu-sell-today/star', 'star'); ?></span>
                       <span class="cwu-hero__star"><?php echo cwu_get_responsive_image('cwu-sell-today/star', 'star'); ?></span>
                       <span class="cwu-hero__star"><?php echo cwu_get_responsive_image('cwu-sell-today/star', 'star'); ?></span>
                   </div>
                   <div class="cwu-hero__reviews-text">
                       <p>Rated <strong>4.7/5</strong> Based on <strong>100+</strong> reviews</p>
                   </div>
               </div>
            </div>


            <ul class="cwu-hero__statistic--list">
                <li class="cwu-hero__statistic--item">
                    <div class="cwu-hero__statistic--amunt">$36M+</div>
                    <div class="cwu-hero__statistic--text">Saved <br>Fees</div>
                </li>
                <li class="cwu-hero__statistic--item">
                    <div class="cwu-hero__statistic--amunt">1,500+</div>
                    <div class="cwu-hero__statistic--text">HOUSES <br>BOUGHT</div>
                </li>
                <li class="cwu-hero__statistic--item">
                    <div class="cwu-hero__statistic--amunt">96%</div>
                    <div class="cwu-hero__statistic--text">SATISFIED <br>CUSTOMERS</div>
                </li>
            </ul>
        </div>
        <div class="cwu-sell-today__media">
            <div class="cwu-sell-today__bg">
                <?php echo cwu_get_responsive_image('cwu-sell-today/last-block-fon', 'Leigh Williams'); ?>
            </div>
            <div class="cwu-sell-today__photo">
                <?php echo cwu_get_responsive_image('cwu-sell-today/'.strtolower($selectedName), esc_attr($selectedName)); ?>
            </div>
        </div>
    </div>
</section>