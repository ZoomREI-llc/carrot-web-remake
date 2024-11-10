<?php
$site_id = get_current_blog_id();
$market_code = get_blog_option($site_id, 'market_code', '');
?>

<section class="cb-oc-page-our-mission">
    <h2 class=""><strong>Our Mission Statement</strong></h2>
    <p>“To give everyone an option to easily <a href="<?php echo get_site_url($site_id, $market_code == 'sf' ? '/sell-your-house-in-the-sf-bay-area' : '/sell-your-house'); ?>">sell a house fast</a> without having to sell with an agent. We buy houses so that you can do what you’d rather do with your time.”</p>
</section>