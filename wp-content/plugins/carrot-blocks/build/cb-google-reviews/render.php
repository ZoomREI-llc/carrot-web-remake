<?php
$selected_direction = esc_html($attributes['selectedDirection']);
$review_text = esc_html($attributes['reviewText']);
$reviewer_name = esc_html($attributes['reviewerName']);
?>

<section class="cb-syh-page-google-reviews__full-width">
    <div class="cb-syh-page-google-reviews cb-syh-page-google-reviews--<?php echo $selected_direction; ?>">
        <div class="cb-syh-page-google-reviews__img-block">
            <?php echo get_responsive_image('cb-google-reviews/google-5-star', 'Google 5 Star Reviews'); ?>
        </div>
        <div class="cb-syh-page-google-reviews__review">
            <p><strong>“<?php echo $review_text; ?>”</strong></p>
            <div class="cb-syh-page-google-reviews__reviewer">
                <span><strong><?php echo $reviewer_name; ?></strong></span>
                <?php echo get_responsive_image('cb-google-reviews/5-gold-stars', '5 Star Review'); ?>
            </div>
        </div>
    </div>
</section>