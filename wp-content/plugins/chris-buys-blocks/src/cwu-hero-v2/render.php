

<section class="cwu-hero-wrapper inter-font" style="
    --background-image-small: url('<?php echo get_image_url('cwu-hero-v2/life-changes-hero-background', 768); ?>');
    --background-image-medium: url('<?php echo get_image_url('cwu-hero-v2/life-changes-hero-background', 1024); ?>');
    --background-image-large: url('<?php echo get_image_url('cwu-hero-v2/life-changes-hero-background', 2048); ?>');
    ">
    <div class="cwu-hero__content grid-container">
        <div class="cwu-hero__reviews">
            <div class="cwu-hero__reviews-stars-wrapper">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-hero-v2/star', 'star'); ?></span>
                <?php endfor; ?>
            </div>
            <div class="cwu-hero__reviews-text">
                <p>Rated <strong>4.7/5</strong> | Based on <strong>100+</strong> reviews</p>
            </div>
        </div>
        <h1 class="cwu-hero__title title-1">We Buy Houses In [market_city], [market_state]</h1>
        <div id="cw-form" class="cwu-hero__form">
            <div class="cwu-hero__form-title">
                <span>Get Your Offer In Record Time</span>
            </div>
            <div class="cwu-hero__form-subtitle">
                <span>Fill out the form. We’ll contact you ASAP.</span>
            </div>
            <?php echo $content; ?>

            <div class="lead-form__disclaimer">
                <p>Your Information is safe & secure</p>
            </div>
        </div>
        <h3 class="cwu-hero__subtitle">Want to sell your house in the <strong>[market_city] As-Is, On Your Timeline?</strong></h3>
        <ul class="cwu-hero__bullet-points">
            <li class="cwu-hero__bullet-point"><?php echo get_responsive_image('cwu-hero-v2/check-circle', 'checkmark'); ?>
                <span><strong>No need for you to clean</strong> or make repairs</span>
            </li>
            <li class="cwu-hero__bullet-point"><?php echo get_responsive_image('cwu-hero-v2/check-circle', 'checkmark'); ?>
                <span>No realtors, <strong>fees, banks, commissions,</strong> or inspectors</span>
            </li>
            <li class="cwu-hero__bullet-point"><?php echo get_responsive_image('cwu-hero-v2/check-circle', 'checkmark'); ?>
                <span>We pay all closing costs - <strong>you pay nothing</strong></span>
            </li>
        </ul>
        <div class="cwu-hero__content--footer">
            <div class="cwu-fresh-start__testimonial">
                <?php echo get_responsive_image('cwu-hero-v2/hero-testimoniels', 'Leigh Williams', 'cwu-fresh-start__testimonee'); ?>
                <div class="cwu-fresh-start__testimonial--content">
                    <blockquote>
                        <p>"We are very grateful for [company] and his team's work.
                            They were always professional and reliable,
                            [company] answered my first call right away and kept me updated throughout the whole selling process.”</p>
                        <cite>
                            <span>Liv Skyler</span>
                            <div class="cwu-hero__reviews-stars-wrapper">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <span class="cwu-hero__star"><?php echo get_responsive_image('cwu-hero-v2/star', 'star'); ?></span>
                                <?php endfor; ?>
                            </div>
                        </cite>
                    </blockquote>
                </div>
            </div>
            <ul class="cwu-hero__statistic--list">
                <li class="cwu-hero__statistic--item">
                    <div class="cwu-hero__statistic--amunt">$36M+</div>
                    <div class="cwu-hero__statistic--text">Saved <span>Fees</span></div>
                </li>
                <li class="cwu-hero__statistic--item">
                    <div class="cwu-hero__statistic--amunt">1,500+</div>
                    <div class="cwu-hero__statistic--text">HOUSES <span>BOUGHT</span></div>
                </li>
                <li class="cwu-hero__statistic--item">
                    <div class="cwu-hero__statistic--amunt">96%</div>
                    <div class="cwu-hero__statistic--text">SATISFIED <br><span>CUSTOMERS</span></div>
                </li>
            </ul>
        </div>
    </div>
</section>