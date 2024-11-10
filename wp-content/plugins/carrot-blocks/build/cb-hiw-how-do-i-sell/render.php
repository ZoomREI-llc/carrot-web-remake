<?php
$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';
$selected_market = esc_html($attributes['selectedMarket']);
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
?>

<section class="cb-hiw-how-do-i-sell__container">
    <div class="cb-hiw-how-do-i-sell">
        <h1>How Do I Sell My House in <?php echo $selected_market; ?> Fast For Cash?</h1>
        <h2 class='cb-hiw-how-do-i-sell__subtitle'>Cash For Houses in <?php echo $selected_market; ?> – This is What We Do</h2>

        <p class="cb-hiw-how-do-i-sell__text">By using our vast knowledge about houses in all areas in <?php echo $selected_market; ?>, and by avoiding any 3rd parties (Agents, banks, inspectors etc.), we can offer cash for homes in <?php echo $selected_market; ?>, and provide a very quick offer so you can <a href="<?php echo get_site_url($site_id, $market_code == 'sf' ? '/sell-your-house-in-the-sf-bay-area' : '/sell-your-house'); ?>">sell your house</a> fast for cash and make it a true hassle-free process for you.</p>
        <ul class="cb-hiw-how-do-i-sell__list">
            <li>SUBMIT YOUR INFO ABOUT YOUR PROPERTY – Fill out the short form so we can call you or simply give us a call at <a style="color:#02bdfc;" href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>.</li>
            <li>GET A CASH OFFER – We’ll talk for about 7 minutes to better understand the condition and situation. Within just 7 minutes, we’ll evaluate the value of your house and present you with a cash offer for your <?php echo $selected_market; ?> home. If you prefer, we can also come and meet you at your property.</li>
            <li>CHOOSE YOUR CLOSING DATE – Our Transactions Coordinator will reach out to you and hold your hand all the way until we close on your home and you get paid!</li>
        </ul>
        <div class="cb-hiw-how-do-i-sell__form-wrapper">
           <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
        </div>
        <div class="cb-hiw-how-do-i-sell__footer">
           <p>
            <strong>Find out if selling your house in <?php echo $selected_market; ?> fast for cash is the best solution for you.</strong>
           </p>
         </div>
    </div>
</section>