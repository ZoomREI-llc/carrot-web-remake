<?php
$market_images = [
    'Kansas City' => 'chris-kc',
    'San Francisco' => 'john-sf',
    'St. Louis' => 'chris-stl',
    'Detroit' => 'chris-det',
    'Cleveland' => 'chris-cle',
    'Indianapolis' => 'chris-ind',
];

$selected_market = esc_html($attributes['selectedMarket']);

$selected_name = ($selected_market === 'San Francisco') ? 'John Kirshenboim' : 'Chris Kirshenboim';

$image_file = isset($market_images[$selected_market]) ? $market_images[$selected_market] : 'default-image';

?>

<section class="cb-syh-page-chris-reviews">
    <h1 class="">
        <em><strong>Get your offer with peace of mind, knowing you are dealing with a legit and reputable company with A+ reviews. We want to buy your house and help you, as much as you want to sell your house, and the only way this will happen is if we make you an offer you will be happy with and will solve your problem!</strong></em>
    </h1>
    <p class="">
        <?php echo cb_get_responsive_image('cb-syh-page-chris-reviews/' . $image_file, $selected_name); ?>
        <strong><?php echo esc_html($selected_name); ?></strong>
    </p>
</section>