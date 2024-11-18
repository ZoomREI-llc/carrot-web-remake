<?php
$selected_market = esc_html($attributes['selectedMarket']);

$market_image_map = [
    'Kansas City' => 'circle-ks',
    'San Francisco' => '',
    'St. Louis' => 'circle-stl',
    'Detroit' => 'circle-det',
    'Cleveland' => 'circle-cle',
    'Indianapolis' => 'circle-ind'
];

$before_after_map = [
    'San Francisco' => 'before-after-john',
    'Kansas City' => 'before-after-chris',
    'St. Louis' => 'before-after-chris',
    'Detroit' => 'before-after-chris',
    'Cleveland' => 'before-after-chris',
    'Indianapolis' => 'before-after-chris'
];

$image_url = isset($market_image_map[$selected_market]) && $market_image_map[$selected_market] ? 'cb-home-as-is/' . $market_image_map[$selected_market] : '';
$before_after_bg = isset($before_after_map[$selected_market]) ? cb_get_image_url('cb-home-as-is/' . $before_after_map[$selected_market], 768) : '';

?>

<section class="cb-home-as-is__full-width " style="--before-after-bg: url('<?php echo $before_after_bg; ?>');">
    <div class="cb-home-as-is">
        <h2>Sell Your <?php echo $selected_market; ?> House As-Is, True As-Is</h2>
        <div class="cb-home-as-is__image">
            <?php if ($image_url) : ?>
                <?php echo cb_get_responsive_image($image_url, 'Logo representing '.$selected_market, 'never-lowball-logo'); ?>
            <?php endif; ?>
        </div>
        <p>
            When we say <i>“We Buy Houses in <?php echo $selected_market; ?> As Is”</i>, we do mean, As-Is,
            in ANY condition! Take what you want & leave the rest – We’ll either
            donate it or get rid of it for you!
        </p>
    </div>
</section>