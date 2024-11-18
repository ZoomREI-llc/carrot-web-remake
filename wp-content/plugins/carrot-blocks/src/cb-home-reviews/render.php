<?php
$selected_market = esc_html($attributes['selectedMarket']);

$chris_reviews = [
    'chris-review-4',
    'chris-review-5',
    'chris-review-6',
    'chris-review-7',
    'chris-review-8',
    'chris-review-10',
    'chris-review-11'

];

$john_reviews = [
    'john-review-1',
    'john-review-2',
    'john-review-3',
    'john-review-4',
    'john-review-5',
    'john-review-6',
    'john-review-7',
    'john-review-8'
];

$selected_reviews = in_array($selected_market, ['San Francisco Bay Area']) ? $john_reviews : $chris_reviews;
?>

<section id="cb-home-reviews" class="cb-home-reviews">
    <div class="cb-home-reviews__header">
        <?php if ($selected_market !== 'St. Louis' && $selected_market !== 'Cleveland' && $selected_market !== 'Detroit') : ?>
            <h2 class="" id=""><strong>😊</strong> People Love Us, And So Will You <strong>😊</strong></h2>
        <?php else : ?>
            <div class="cb-home-reviews__img-wrapper">
                <?php echo cb_get_responsive_image('cb-home-reviews/reviews-header', 'People Love Us, And So Will You'); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($selected_market !== 'Indianapolis' && $selected_market !== 'Cleveland' && $selected_market !== 'Detroit') : ?>
        <div class="cb-home-reviews__wrapper">
            <hr />
            <?php foreach ($selected_reviews as $review) : ?>
                <div class="cb-home-reviews__item">
                    <?php echo cb_get_responsive_image('cb-home-reviews/'.$review, 'Review'); ?>
                </div>
                <hr />
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>