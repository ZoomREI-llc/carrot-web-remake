<?php
$selected_market = esc_html($attributes['selectedMarket']);

$before_img_url = esc_url(plugins_url('src/cb-hiw-make-an-offer-on-a-home/assets/Tulane-Before-5-1.webp', dirname(__FILE__, 2)));
$after_img_url = esc_url(plugins_url('src/cb-hiw-make-an-offer-on-a-home/assets/Tulane-After-5.webp', dirname(__FILE__, 2)));
?>

<section class="cb-hiw-make-an-offer-on-a-home">

       <h2>So How Do We Make An Offer On A Home?</h2>
       <p>The answer to this question might surprise you, but once you’ll understand it, you’ll realize that this is the best way to formulate offers, and they are always fair and <strong>based on the current market condition in <?php echo esc_html($selected_market) ?></strong>. We offer cash for houses in <?php echo esc_html($selected_market) ?>, and they are always FAIR!</p>

       <div class="cb-hiw-make-an-offer-on-a-home__steps">
              <h3 class="">Tell Me More!</h3>
              <p class="">With this process of making offers you are always getting a fair offer since it is based on other houses in the neighborhood that have been sold in a similar condition your property – You can’t beat that!</p>
              <p class=""><strong>First</strong>, we will need to have a good understanding about the condition of your house. We’ll ask you a set of questions that will help us evaluate the cost of repairs and updates that are required in order to bring it to current market condition.</p>
              <p class=""><strong>Second</strong>, we will look for similar houses in the neighborhood (similar size, number of bedrooms, bathroom etc.) that <strong><a href="https://propertymetrics.com/blog/sales-comparison-approach/">we’re recently sold in As-Is condition</a></strong> and are in a similar condition to your house (also known as “comparable sales”, or “comps”). <br>We always compare apples to apples. It doesn’t make sense to compare a fully renovated “like new” house with an one that has not been updated for years.</p>
              <div class="cb-hiw-make-an-offer-on-a-home__steps--media-block">
                     <div class="cb-hiw-make-an-offer-on-a-home__steps--media-item">
                            <img decoding="async" src="<?php echo esc_url($before_img_url); ?>" alt="Sell My House Fast For Cash in <?php echo esc_html($selected_market) ?>" class="">
                            <span class="cb-hiw-make-an-offer-on-a-home__steps--media-discr">As-Is House</span>
                     </div>
                     <div class="cb-hiw-make-an-offer-on-a-home__steps--media-item">
                            <img decoding="async" src="<?php echo esc_url($after_img_url); ?>" alt="Cash For Houses in <?php echo esc_html($selected_market) ?>" class="">
                            <span class="cb-hiw-make-an-offer-on-a-home__steps--media-discr">Renovated House (Believe it or not, this is the same house, just few months later)</span>
                     </div>
              </div>
              <p class=""><strong>Third</strong>, we take the average price per square foot of the As-Is comparable sales and apply it to your house – and Voila! Here’s your offer!</p>
       </div>

</section>