<?php
$market_images = [
    'Kansas City' => 'chris-kc.webp',
    'San Francisco' => 'john-sf.webp',
    'St. Louis' => 'chris-stl.webp',
    'Detroit' => 'chris-det.webp',
    'Cleveland' => 'chris-cle.webp',
    'Indianapolis' => 'chris-ind.webp',
];

$selected_market = esc_html($attributes['selectedMarket']);

$selected_name = ($selected_market === 'San Francisco') ? 'John Kirshenboim' : 'Chris Kirshenboim';

$image_file = isset($market_images[$selected_market]) ? $market_images[$selected_market] : 'default-image.webp';
$image_url = esc_url(plugins_url('src/cb-syh-page-chris-reviews/assets/' . $image_file, dirname(__FILE__, 2)));
?>

<section class="cb-syh-page-chris-reviews">
    <h1 class="">
        <em><strong>Get your offer with peace of mind, knowing you are dealing with a legit and reputable company with A+ reviews. We want to buy your house and help you, as much as you want to sell your house, and the only way this will happen is if we make you an offer you will be happy with and will solve your problem!</strong></em>
    </h1>
    <p class="">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($selected_name); ?>">
        <strong><?php echo esc_html($selected_name); ?></strong>
    </p>
</section>