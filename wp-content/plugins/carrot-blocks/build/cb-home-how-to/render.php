<?php
$selected_market = esc_html($attributes['selectedMarket']);

// Mapping the market name to market code
$market_code_map = [
    'Kansas City' => 'kc',
    'San Francisco Bay Area' => 'sf',
    'St. Louis' => 'stl',
    'Metro Detroit' => 'det',
    'Cleveland' => 'cle',
    'Indianapolis' => 'ind'
];

$market_code = isset($market_code_map[$selected_market]) ? $market_code_map[$selected_market] : 'kc';
?>

<section class="cb-home-how-to__full-width ">
    <div id="cb-home-how-to" class="cb-home-how-to">
        <h2>How Do I Sell My Home Fast In <?php echo $selected_market; ?>?</h2>
        <p>
            Selling your <?php echo $selected_market; ?> house fast to a reputable local home buyer
            is pretty easy. We eliminate the “middle man”. We do not depend on
            approvals from third parties (like banks when using a loan or real
            estate agents) in order to buy your home (we buy houses in <?php echo $selected_market; ?>
            with cash!). Our offers are ALWAYS fair, no “low-ball” offers.
        </p>
        <div class="cb-home-how-to__steps">
            <div class="cb-home-how-to__step">
                <a href="/our-company" class="cb-home-how-to-step__image">
                    <?php echo get_responsive_image('cb-home-how-to/about-' . $market_code, 'Learn more about us in '.$selected_market); ?>
                </a>
                <div class="cb-home-how-to-step__text">
                    <div class="cb-home-how-to-step__text__heading">
                        <?php echo get_responsive_image('cb-home-how-to/1-black', 'Icon'); ?>
                        <span>Go to <a href="/our-company" data-type="page" data-id="49">“About Us”</a></span>
                    </div>
                    <p class="cb-home-how-to-step__text__description">
                        Learn more about who you’re dealing with and selling your
                        house to
                    </p>
                </div>
            </div>
            <div class="cb-home-how-to__step">
                <a href="/how-we-buy-houses" class="cb-home-how-to-step__image">
                    <?php echo get_responsive_image('cb-home-how-to/how-' . $market_code, 'Learn how we buy houses in '.$selected_market); ?>
                </a>
                <div class="cb-home-how-to-step__text">
                    <div class="cb-home-how-to-step__text__heading">
                        <?php echo get_responsive_image('cb-home-how-to/2-black', 'Icon'); ?>
                        <span>Read the <a href="/how-we-buy-houses" data-type="page" data-id="349">“How It Works”</a></span>
                    </div>
                    <p class="cb-home-how-to-step__text__description">
                        This way you’ll be prepared when talking to us about your home
                    </p>
                </div>
            </div>
            <div class="cb-home-how-to__step">
                <a href="/sell-your-house" class="cb-home-how-to-step__image">
                    <?php echo get_responsive_image('cb-home-how-to/sell-' . $market_code, 'Sell your house fast in '.$selected_market); ?>
                </a>
                <div class="cb-home-how-to-step__text">
                    <div class="cb-home-how-to-step__text__heading">
                        <?php echo get_responsive_image('cb-home-how-to/3-black', 'Icon'); ?>
                        <span>Request Your <a href="/sell-your-house" data-type="page" data-id="20">Cash Offer</a></span>
                    </div>
                    <p class="cb-home-how-to-step__text__description">
                        We will not waste your time. Fill in any of our forms and
                        receive your offer
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>