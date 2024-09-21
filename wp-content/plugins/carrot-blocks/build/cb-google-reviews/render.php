<?php
$selected_direction = esc_html($attributes['selectedDirection']);
$review_text = esc_html($attributes['reviewText']);
$reviewer_name = esc_html($attributes['reviewerName']);

$google_url = esc_url(plugins_url('src/cb-google-reviews/assets/google-5-star.webp', dirname(__FILE__, 2)));
$five_stars_url = esc_url(plugins_url('src/cb-google-reviews/assets/5-gold-stars.webp', dirname(__FILE__, 2)));
?>

<section class="cb-syh-page-google-reviews__full-width">
    <div class="cb-syh-page-google-reviews cb-syh-page-google-reviews--<?php echo $selected_direction; ?>">
        <div class="cb-syh-page-google-reviews__img-block">
            <img class="" src="<?php echo $google_url; ?>" alt="Google 5 Star Reviews" />
        </div>
        <div class="cb-syh-page-google-reviews__review">
            <p><strong>“<?php echo $review_text; ?>”</strong></p>
            <div class="cb-syh-page-google-reviews__reviewer">
                <span><strong><?php echo $reviewer_name; ?></strong></span>
                <img src="<?php echo $five_stars_url; ?>" alt="5 Star Review" />
            </div>
        </div>
    </div>
</section>