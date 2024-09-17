<?php
$selected_market = esc_html($attributes['selectedMarket']);
$brand_name = ($selected_market === 'the San Francisco Bay Area') ? 'John Buys Bay Area Houses' : 'Chris Buys Homes in ' . $selected_market;

?>

<section class="cb-oc-page-reputable">

      <h2 class=""><strong>Reputable Home Buying Company in <?php echo esc_html($selected_market); ?></strong></h2>
      <p class="">You’re might be thinking, “what makes this company different from other house buying companies out there?” <strong><em>We’re glad you asked…</em></strong></p>
      <p class="has-large-font-size">We’re able to pay more than other house buying companies. That’s because we have set ourselves up with contractors that repair the houses at a discount for us. They give us these discounts due to the volume of work we provide for them. This allows us to <strong>pay you more money</strong> for your house and allows us to still make a return on our investment.</p>
      <p class="has-large-font-size">This company is how we make a living. At <?php echo esc_html($brand_name); ?>, we always treat people with respect, and our reputation is flawless. You can be assured that this is not just an empty statement by reading through.</p>


</section>