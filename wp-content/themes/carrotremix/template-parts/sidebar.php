<?php
$site_data = cbh_get_site_data();
$market_city = $site_data['market_city'];
$market_code = $site_data['market_code'];

$phone_numbers = [
    'sf'  => '(510) 283-9871',
    'stl' => '(314) 334-1481',
    'kc'  => '(816) 720-7760',
    'det' => '(313) 217-9851',
    'cle' => '(216) 677-2169',
    'ind' => '(317) 526-4712',
];

$phoneNumber = isset($phone_numbers[$market_code]) ? $phone_numbers[$market_code] : '';
?>

<aside id="secondary" class="widget-area" role="complementary">
    <!-- Listing vs Selling Section -->
    <section class="widget widget_listing_vs_selling">
        <h3>Listing vs. Selling To Us</h3>
        <p>Which route is quicker? Puts more cash in your pocket? Has less hassle?</p>
        <a href="/compare" class="btn">See The Difference Here</a>
    </section>

    <!-- Cash Offer Form Section -->
    <section class="widget widget_cash_offer_form">
        <h3>Get Your Fair Cash Offer: Start Below!</h3>
        <p>We buy houses in ANY CONDITION in <?php echo $market_city; ?>. There are no commissions or fees and no obligation whatsoever. For the fastest service, call us now <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a></p>
        <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
    </section>

    <!-- Recent Posts Section -->
    <section class="widget widget_recent_posts">
        <h3>Recent Posts</h3>
        <ul class="recent-posts">
            <?php
            // Query for recent posts
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 5, // Change the number to display more posts
                'post_status' => 'publish'
            ));
            foreach ($recent_posts as $post) {
                echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
            }
            wp_reset_query();
            ?>
        </ul>
    </section>
</aside>