<aside id="secondary" class="widget-area" role="complementary">
    <!-- Listing vs Selling Section -->
    <div class="widget widget_listing_vs_selling">
        <h2>Listing vs. Selling To Us</h2>
        <p>Which route is quicker? Puts more cash in your pocket? Has less hassle?</p>
        <a href="#" class="btn-primary">See The Difference Here</a>
    </div>

    <!-- Cash Offer Form Section -->
    <div class="widget widget_cash_offer_form">
        <h2>Get Your Fair Cash Offer: Start Below!</h2>
        <p>We buy houses in ANY CONDITION in Kansas City. There are no commissions or fees and no obligation whatsoever. For the fastest service, call us now <strong>(816) 227-6952</strong></p>
        <form action="#" method="post" class="cash-offer-form">
            <p>
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" required>
            </p>
            <p>
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </p>
            <p>
                <label for="property-address">Property Address</label>
                <input type="text" id="property-address" name="property-address">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </p>
            <p>
                <label for="hear-about-us">How Did You Hear About Us?</label>
                <select id="hear-about-us" name="hear-about-us">
                    <option value="">Please Select Option</option>
                    <option value="google">Google</option>
                    <option value="radio">Radio</option>
                    <option value="tv">TV</option>
                    <option value="friend">Friend/Family</option>
                </select>
            </p>
            <p><button type="submit" class="btn-primary">Get My Offer Now!</button></p>
        </form>
    </div>

    <!-- Recent Posts Section -->
    <div class="widget widget_recent_posts">
        <h2>Recent Posts</h2>
        <ul>
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
    </div>
</aside>