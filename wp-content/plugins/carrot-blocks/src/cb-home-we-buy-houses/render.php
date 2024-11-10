<?php
$site_id = get_current_blog_id();
$market_code = get_blog_option($site_id, 'market_code', '');

$selected_market = esc_html($attributes['selectedMarket']);
?>

<section class="cb-home-we-buy-houses__container">
    <div class="cb-home-we-buy-houses">
        <h1>We Buy Houses In <?php echo $selected_market; ?></h1>
        <h2>
            Sell Your House Fast In <?php echo $selected_market; ?>, And Avoid Paying Agent Fees,
            Closing Costs, Repairs, and Having Months of Uncertainty. Find Out How
            <!-- Link to the appropriate page based on the market code -->
            <a 
                rel="noreferrer noopener" 
                href="<?php echo get_site_url($site_id, $market_code == 'sf' ? '/how-do-i-sell-my-house-in-the-sf-bay-area' : '/how-we-buy-houses'); ?>" 
                data-type="page" 
                data-id="349" 
                target="_blank"
            >
                <!-- Anchor text describing the home buying process -->
                Our Home Buying Process&nbsp;
            </a> 
            Works!
        </h2>
    </div>
</section>