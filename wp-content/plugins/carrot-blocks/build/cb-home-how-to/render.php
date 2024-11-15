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

$one_icon_url = esc_url(plugins_url('src/cb-home-how-to/assets/1-black.svg', dirname(__FILE__, 2)));
$two_icon_url = esc_url(plugins_url('src/cb-home-how-to/assets/2-black.svg', dirname(__FILE__, 2)));
$three_icon_url = esc_url(plugins_url('src/cb-home-how-to/assets/3-black.svg', dirname(__FILE__, 2)));

$about_image_url = esc_url(plugins_url('src/cb-home-how-to/assets/about-' . $market_code . '.webp', dirname(__FILE__, 2)));
$how_image_url = esc_url(plugins_url('src/cb-home-how-to/assets/how-' . $market_code . '.webp', dirname(__FILE__, 2)));
$sell_image_url = esc_url(plugins_url('src/cb-home-how-to/assets/sell-' . $market_code . '.webp', dirname(__FILE__, 2)));
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
                    <img src="<?php echo $about_image_url; ?>" alt="Learn more about us in <?php echo $selected_market; ?>" />
                </a>
                <div class="cb-home-how-to-step__text">
                    <div class="cb-home-how-to-step__text__heading">
                        <img src="<?php echo $one_icon_url; ?>" alt="" />
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
                    <img src="<?php echo $how_image_url; ?>" alt="Learn how we buy houses in <?php echo $selected_market; ?>" />
                </a>
                <div class="cb-home-how-to-step__text">
                    <div class="cb-home-how-to-step__text__heading">
                        <img src="<?php echo $two_icon_url; ?>" alt="" />
                        <span>Read the <a href="/how-we-buy-houses" data-type="page" data-id="349">“How It Works”</a></span>
                    </div>
                    <p class="cb-home-how-to-step__text__description">
                        This way you’ll be prepared when talking to us about your home
                    </p>
                </div>
            </div>
            <div class="cb-home-how-to__step">
                <a href="/sell-your-house" class="cb-home-how-to-step__image">
                    <img src="<?php echo $sell_image_url; ?>" alt="Sell your house fast in <?php echo $selected_market; ?>" />
                </a>
                <div class="cb-home-how-to-step__text">
                    <div class="cb-home-how-to-step__text__heading">
                        <img src="<?php echo $three_icon_url; ?>" alt="" />
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