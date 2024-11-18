<?php
$market_images = [
    'Kansas City' => 'chris-kc',
    'San Francisco' => 'john-sf',
    'St. Louis' => 'chris-stl',
    'Detroit' => 'chris-det',
    'Cleveland' => 'chris-cle',
    'Indianapolis' => 'chris-ind',
];

$market_links = [
    'Indianapolis' => 'https://www.finder.com/mortgages/closing-costs-in-indiana',
    'Cleveland' => 'https://www.finder.com/mortgages/closing-costs-in-ohio',
    'Detroit' => 'https://www.finder.com/mortgages/closing-costs-in-michigan',
    'Kansas City' => 'https://www.finder.com/mortgages/closing-costs-in-missouri',
    'St. Louis' => 'https://www.finder.com/mortgages/closing-costs-in-missouri',
    'San Francisco' => 'N/A',
];

// Set default brand names
$selected_market = esc_html($attributes['selectedMarket']);
$brand_name = ($selected_market === 'San Francisco') ? 'John Buys Bay Area Houses' : 'Chris Buys Homes in ' . $selected_market;

// Get the appropriate image based on the market
$image_file = isset($market_images[$selected_market]) ? $market_images[$selected_market] : 'default-image';

// Get the appropriate link based on the market
$closing_costs_link = isset($market_links[$selected_market]) ? $market_links[$selected_market] : '#';
?>

<section class="cb-oc-page-about">

    <h1>About <?php echo esc_html($brand_name); ?></h1>

    <div class="cb-oc-page-about__content">
        <?php echo cb_get_responsive_image('cb-oc-page-about/' . $image_file, $brand_name); ?>
        <div class="cb-oc-page-about__text">
            <p><?php echo esc_html($brand_name); ?> is a locally owned and operated small business. We are legitimate house buyers in <?php echo esc_html($selected_market); ?>, and through our real estate experience and the long-term relationships with our clients, we became a reputable home buying company and realized that a lot of homeowners are dealing with very stressful situations. They don’t have the time or patience to deal with realtors, commissions, costly repairs,
                <?php if ($closing_costs_link !== 'N/A'): ?>
                    <a href="<?php echo esc_url($closing_costs_link); ?>">closing costs</a>
                <?php else: ?>
                    closing costs
                <?php endif; ?>
                , unqualified buyers, etc.
            </p>
        </div>
    </div>
</section>