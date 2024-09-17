<?php
$selected_market = esc_html($attributes['selectedMarket']);
$brand_name = ($selected_market === 'San Francisco') ? 'John Buys Bay Area Houses' : 'Chris Buys Homes in ' . $selected_market; ?>

<section class="cb-oc-page-care-values">

  <h2><strong>Core Values</strong></h2>
  <p>These core values are the center of our beliefs and shape who we are and how we operate at <?php echo esc_html($brand_name); ?>:</p>

  <ul>
    <li><strong>Be Empathetic</strong></li>
    <li><strong>Be Humble</strong></li>
    <li><strong>Always Follow Through</strong></li>
    <li><strong>Provide a WOW Experience</strong></li>
    <li><strong>Pursue Growth and Learning</strong></li>
    <li><strong>How We Are Different</strong></li>
  </ul>
</section>