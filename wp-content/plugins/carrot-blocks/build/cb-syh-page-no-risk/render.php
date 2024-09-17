<?php
// Mapping markets to the corresponding URLs for avoiding realtor commissions
$commission_links = [
  'Indianapolis' => 'https://www.upnest.com/re/realtor-commissions/in/indianapolis',
  'Cleveland' => 'https://www.listingbidder.com/real-estate-commission-rates/real-estate-commission-rate-cleveland-elyria-ohio/',
  'Detroit' => 'https://www.listingbidder.com/real-estate-commission-rates/real-estate-commission-rate-detroit-warren-dearborn-michigan/',
  'Kansas City' => 'https://www.upnest.com/re/realtor-commissions/kansas-city-mo',
  'St. Louis' => 'https://stlouisrealestatenews.com/real-estate-market/st-louis-real-estate-market/truth-real-estate-commission/',
  'San Francisco' => 'https://www.financialsamurai.com/what-does-it-cost-to-sell-a-house-a-look-at-the-commissions-taxes-and-fees/',
];

// Get the selected market from the block attributes
$selected_market = esc_html($attributes['selectedMarket']);

// Get the appropriate commission link based on the selected market
$commission_link = isset($commission_links[$selected_market]) ? $commission_links[$selected_market] : '#'; // Fallback to '#' if market is not in the list
?>

<section class="cb-syh-page-no-risk">
  <h2 class=""><strong>No-Risk, No-Obligation, Completely Hassle-Free Way Of Selling Your House</strong></h2>
  <p>Are you currently facing any of these situations?</p>
  <ul>
    <li><a href="https://www.hud.gov/topics/avoiding_foreclosure">Are You In <strong>Foreclosure</strong></a> or Are About To Be?</li>
    <li>Do You Own <strong>Unwanted Rental Property</strong>?</li>
    <li>Do You Have <strong><a href="https://www.moneycrashers.com/deal-with-bad-tenants/">Frustrating Tenants</a></strong> (Or Family Members) That You Can’t Get Rid Of?</li>
    <li>Do You Own A <strong>Vacant Property</strong>?</li>
    <li>Did You <strong>Inherit An Unwanted Property</strong>?</li>
    <li>Do You <strong>Need To Relocate Quickly</strong> And Need To Sell Your Current House Fast?</li>
    <li>Do You Want To <strong>Avoid <a href="<?php echo esc_url($commission_link); ?>">Paying Realtor Commissions</a></strong>?</li>
    <li>Are You Going Through A <strong>Divorce</strong>?</li>
    <li>Do You <strong>Have Little Or No Equity</strong> And Need To Sell?</li>
    <li>Do You Own A “<strong>Fixer Upper</strong>” That You Don’t Want To Fix Up Or Don’t Have Time To Fix Up?</li>
  </ul>
  <p class="has-large-font-size">If you answered “yes” to one or more of these questions, <strong>we can help!</strong> We are specialists in solving real estate problems… (We like to call ourselves “Real Estate Doctors” 😊) especially ones that pose a financial burden on you, the homeowner. We can solve almost any financial problem that your property is causing and you can sell your house in <?php echo $selected_market; ?> today.</p>
</section>