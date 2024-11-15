<?php
$selected_market = esc_html($attributes['selectedMarket']);

$market_image_map = [
    'Kansas City' => 'circle-ks.webp',
    'San Francisco' => '',
    'St. Louis' => 'circle-stl.webp',
    'Detroit' => 'circle-det.webp',
    'Cleveland' => 'circle-cle.webp',
    'Indianapolis' => 'circle-ind.webp'
];

$before_after_map = [
    'San Francisco' => 'before-after-john.webp',
    'Kansas City' => 'before-after-chris.webp',
    'St. Louis' => 'before-after-chris.webp',
    'Detroit' => 'before-after-chris.webp',
    'Cleveland' => 'before-after-chris.webp',
    'Indianapolis' => 'before-after-chris.webp'
];

$image_url = isset($market_image_map[$selected_market]) && $market_image_map[$selected_market] ? esc_url(plugins_url('src/cb-home-as-is/assets/' . $market_image_map[$selected_market], dirname(__FILE__, 2))) : '';
$before_after_bg = isset($before_after_map[$selected_market]) ? esc_url(plugins_url('src/cb-home-as-is/assets/' . $before_after_map[$selected_market], dirname(__FILE__, 2))) : '';

?>

<section class="cb-home-as-is__full-width " style="--before-after-bg: url('<?php echo $before_after_bg; ?>');">
    <div class="cb-home-as-is">
        <h2>Sell Your <?php echo $selected_market; ?> House As-Is, True As-Is</h2>
        <div class="cb-home-as-is__image">
            <?php if ($image_url) : ?>
                <img
                    src="<?php echo $image_url; ?>"
                    alt="Logo representing <?php echo $selected_market; ?>" />
            <?php endif; ?>
        </div>
        <p>
            When we say <i>“We Buy Houses in <?php echo $selected_market; ?> As Is”</i>, we do mean, As-Is,
            in ANY condition! Take what you want & leave the rest – We’ll either
            donate it or get rid of it for you!
        </p>
    </div>
</section>