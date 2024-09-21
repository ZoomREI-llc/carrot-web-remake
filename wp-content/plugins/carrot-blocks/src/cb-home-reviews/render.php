<?php
$selected_market = esc_html($attributes['selectedMarket']);

$chris_reviews = [
    'chris-review-4.webp',
    'chris-review-5.webp',
    'chris-review-6.webp',
    'chris-review-7.webp',
    'chris-review-8.webp',
    'chris-review-10.webp',
    'chris-review-11.webp'

];

$john_reviews = [
    'john-review-1.webp',
    'john-review-2.webp',
    'john-review-3.webp',
    'john-review-4.webp',
    'john-review-5.webp',
    'john-review-6.webp',
    'john-review-7.webp',
    'john-review-8.webp'
];

$selected_reviews = in_array($selected_market, ['San Francisco Bay Area']) ? $john_reviews : $chris_reviews;

$base_url = esc_url(plugins_url('src/cb-home-reviews/assets/', dirname(__FILE__, 2)));

$reviews_header_url = esc_url(plugins_url('src/cb-home-reviews/assets/reviews-header.webp', dirname(__FILE__, 2)));
?>

<section id="cb-home-reviews" class="cb-home-reviews">
    <div class="cb-home-reviews__header">
        <h2 class="" id=""><strong>😊</strong> People Love Us, And So Will You <strong>😊</strong></h2>
        <!-- <img src="<?php echo $reviews_header_url; ?>" alt="People Love Us, And So Will You">  -->
    </div>
    <?php if ($selected_market !== 'Indianapolis') : ?>
        <div class="cb-home-reviews__wrapper">
            <hr />
            <?php foreach ($selected_reviews as $review) : ?>
                <div class="cb-home-reviews__item">
                    <img
                        src="<?php echo $base_url . $review; ?>"
                        alt="Review" />
                </div>
                <hr />
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>