<?php
$selected_market = esc_html($attributes['selectedMarket']);
$brand_name = ($selected_market === 'San Francisco') ? 'John Buys Bay Area Houses' : 'Chris Buys Homes in ' . $selected_market;

?>

<section class="cb-oc-page-how-do-we-work">
      <h2 class=""><strong>How do We Work With Homeowners?</strong></h2>
      <p class="">If you have any questions about <a href="/how-we-buy-houses">how we work</a>, what the process of selling a house or having us help you avoid foreclosure, or just want to learn more about us… don’t hesitate to <a href="/contact-us">contact <?php echo esc_html($brand_name); ?></a> anytime! </p>
</section>