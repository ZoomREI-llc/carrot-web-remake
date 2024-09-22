<?php
$market_states = [
    'Indianapolis' => 'IN',
    'Cleveland' => 'OH',
    'Detroit' => 'MI',
    'Kansas City' => 'MO',
    'St. Louis' => 'MO',
    'San Francisco' => 'CA',
];

$selected_market = esc_html($attributes['selectedMarket']);
$selected_state = $market_states[$selected_market];
$brand_name = ($selected_market === 'San Francisco') ? 'John Buys Bay Area Houses' : 'Chris Buys Homes in ' . $selected_market;

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$bbb_url = esc_url(plugins_url('src/cb-compare-body/assets/bbb.png', dirname(__FILE__, 2)));
?>

<style>
    :root {
        <?php if ($selected_market === 'Indianapolis') : ?>--show-select: none;
        <?php endif; ?>
    }
</style>

<section class="cb-compare-body-wrapper">
    <h1 class="wp-block-heading">Selling To <?php echo $brand_name; ?> vs. Listing With A Local <?php echo $selected_state; ?> Agent</h1>
    <p class="">Even in a seller’s market like <?php echo $selected_state; ?>, it’s smart to look at your options and see what will actually help you best reach your goals with the sale of your house. While you may be able to get a higher “top line” sales price listing with a local <?php echo $selected_market; ?> agent, that doesn’t always boil down to more money in your pocket or less headache. </p>
    <figure class="wp-block-table table table-bordered table-striped">
        <table>
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Selling w/ An Agent</th>
                    <th>SOLD To&nbsp;<?php echo $brand_name; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Commissions / Fees:</strong></td>
                    <td><span style="text-decoration: underline"><em>6%</em></span> on average is paid by you, the seller</td>
                    <td>NONE</td>
                </tr>
                <tr>
                    <td><strong>Who Pays Closing Costs?:</strong></td>
                    <td><span style="text-decoration: underline"><em>2%</em></span> on average is paid by you, the seller</td>
                    <td>NONE – We pay all costs</td>
                </tr>
                <tr>
                    <td><strong>Inspection &amp; Financing Contingency*:</strong></td>
                    <td><span style="text-decoration: underline"><em>Yes</em></span>, sales can <a href="http://www.trulia.com/blog/5-reasons-home-sales-fall-prevent/" target="_blank" rel="noopener noreferrer">fall through</a></td>
                    <td>NONE</td>
                </tr>
                <tr>
                    <td><strong>Appraisal Needed:</strong></td>
                    <td><em><span style="text-decoration: underline">Yes</span></em>, the sale is often subject to appraisal</td>
                    <td>NONE – We make <span style="text-decoration: underline"><em>cash offers</em></span></td>
                </tr>
                <tr>
                    <td><strong>Average Days Until Sold:</strong></td>
                    <td>+/- 91 Days</td>
                    <td>IMMEDIATE CASH OFFER</td>
                </tr>
                <tr>
                    <td><strong>Number of Showings:</strong></td>
                    <td>It Depends</td>
                    <td>1 (Just Us)</td>
                </tr>
                <tr>
                    <td><strong>Closing Date:</strong></td>
                    <td>30-60 +/- days after accepting buyers offer</td>
                    <td>The Date Of YOUR CHOICE</td>
                </tr>
                <tr>
                    <td><strong>Who Pays For Repairs?:</strong></td>
                    <td>Negotiated During Inspection Period</td>
                    <td>NONE – We pay for all repairs</td>
                </tr>
            </tbody>
        </table>
    </figure>
    <hr>
    <h2 class=" wp-block-heading">Work The Numbers And See Which Way Helps You Get There…</h2>
    <p>When you really work the numbers you start to see the real benefits that each way of selling your <?php echo $selected_state; ?> house offers.</p>
    <p>Yes, here at <?php echo $brand_name; ?> we won’t be able to offer you full retail value for your house… but we also offer other benefits that the traditional house sale route can’t offer.</p>
    <p>Like…</p>

    <h3 class="wp-block-heading"><strong>From offer to close</strong> and cash in your hand in as little as 7 days</h3>
    <p>You can get rid of the headache of that property fast and <span style="text-decoration: underline"><strong>avoid paying any more utility payments</strong></span>, <strong>tax</strong> payments, <strong>insurance</strong> payments, <strong>mortgage</strong> payments, you get the drill. If you list your house and wait 90+ days to close… you have to figure in all of the costs of holding that property during the time you have that property listed and are waiting for the property to close.</p>

    <h3 class="wp-block-heading"><strong>Don’t worry about fixing anything up</strong> or cleaning your house again and again for buyer after buyer</h3>
    <p>We don’t care how dirty your house is (<em>we’ve seen worse!)</em> or how many repairs are needed <em>(a complete fixer? great! we love projects).</em>.. <strong><a href="/sell-your-house/" target="_blank" rel="noreferrer noopener" aria-label=" (opens in a new tab)">we’d like to make an offer on your house.</a></strong> This saves you time and money that you can keep in your pocket.</p>

    <h3 class="wp-block-heading"><strong>Don’t worry about paying those pesky closing fees</strong> (we’ve got you covered)</h3>
    <p>Because we are&nbsp;a <strong>full-service professional home buyer here in <?php echo $selected_state; ?></strong>, we make it easy for you. We pay for all of the closing costs. What we offer you is what you get (of course minus any mortgage payoff or other encumbrances on the property). Pretty refreshing eh?</p>

    <p>So when you add up the time you could save by working with <?php echo $brand_name; ?>, the no-hassle experience, and the money you’ll save on commissions, fees, and holding costs while you wait to sell the traditional route… for many area homeowners selling to a professional house buyer is the best viable option.</p>
    <p><strong>Just fill out the short form below or give us a call at <a href="tel:317-526-4712" style="color: #02bdfc">(317) 526-4712</a></strong> and let’s chat! <a href="/how-we-buy-houses/">Our process</a> is <strong>simple</strong> and you can <span style="text-decoration: underline"><strong>close on the date of your choice.</strong></span> You have nothing to lose by getting an offer (no obligations – no pressure). But you could potentially lose thousands of dollars or months of your time by not testing us out and <span style="text-decoration: underline"><strong>requesting your FREE house offer below.&nbsp;</strong></span></p>
    <p>Is it for you?</p>

    <h4 class="wp-block-heading">See for yourself and get a <strong>fair all-cash offer</strong> on your house <span style="text-decoration: underline"><strong>today</strong></span>.</h4>
    <div class="cb-compare__form-block">
        <div class="cb-compare__form-block--text">
            <?php if ($selected_market !== 'Indianapolis'): ?>
                <span>We buy houses in ANY CONDITION in <?php echo $selected_market; ?>. There are no commissions or fees and no obligation whatsoever.
                    For the fastest service, call us now <a href="tel:<?php echo $phone_number; ?>" style="color: #02bdfc"><?php echo $phone_number; ?></a></span>
            <?php else: ?>
                <div class="custom-form-content">
                    <h3>What Do You Have To Lose? Get Started Now...</h3>
                    <a href="https://chrisbuyshomesstlseller8.carrot.com/legitimate-home-buyers-in-indianapolis/#BBB">
                        <img class="cb-home-hero__bbb-logo"
                            src="<?php echo esc_url($bbb_url); ?>"
                            alt="" />
                    </a>
                    <span>We buy houses in any condition. No realtors, no fees, no repairs, no cleaning. <span style="color: rgb(2, 189, 252); font-weight: 700;"> Find Out How Much We Can Offer For Your House!</span></span>
                    <h4>Get a solid offer today!</h4>
                </div>
            <?php endif; ?>
        </div>
        <div class=" cb-compare__form-wrapper">
            <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
        </div>
    </div>

    <p>*An <strong>inspection contingency</strong>&nbsp;lets the buyer have time to do an inspection and back out of the sale or negotiate a new price if&nbsp;there are repairs that need to be done. If you can’t come to an agreement with the buyer, the buyer has the right to back out of the sale. Similar, a&nbsp;<strong>financing contingency</strong>&nbsp;gives the buyer the wiggle room to back out of the purchase if they can’t obtain a loan or if the home doesn’t appraise for the value that the bank needs to close the loan.</p>
    <p>Here at <?php echo $brand_name; ?>, we don’t use bank financing so you don’t have to worry about our ability to close on a deal.</p>

    <div class="entry-share">
        <ul class="entry-share-btns">
            <li class="entry-share-btn entry-share-btn-facebook">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 64 64">
                        <path d="M42 12c-5.523 0-10 4.477-10 10v6h-8v8h8v28h8V36h9l2-8H40v-6c0-1.105.895-2 2-2h10v-8H42z" fill="#fff"></path>
                    </svg>
                    <b style="font-weight: 400;">Share</b>
                </a>
            </li>
            <li class="entry-share-btn entry-share-btn-twitter">
                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" title="Share on Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 64 64">
                        <path d="M64 12.15c-2.355 1.045-4.885 1.75-7.54 2.068 2.71-1.625 4.792-4.198 5.772-7.264-2.537 1.505-5.347 2.597-8.338 3.186-2.395-2.552-5.808-4.146-9.584-4.146-7.25 0-13.13 5.88-13.13 13.13 0 1.03.116 2.03.34 2.992-10.912-.548-20.588-5.775-27.064-13.72-1.13 1.94-1.778 4.196-1.778 6.602 0 4.556 2.318 8.575 5.84 10.93-2.15-.07-4.176-.66-5.946-1.643v.165c0 6.362 4.525 11.668 10.532 12.875-1.102.3-2.262.46-3.46.46-.845 0-1.668-.082-2.47-.235 1.672 5.216 6.52 9.013 12.267 9.118-4.493 3.522-10.154 5.62-16.306 5.62-1.06 0-2.105-.06-3.132-.183 5.81 3.726 12.713 5.9 20.128 5.9 24.15 0 37.358-20.008 37.358-37.36 0-.568-.013-1.135-.038-1.698 2.566-1.85 4.792-4.164 6.552-6.797z" fill="#fff"></path>
                    </svg>
                    <b style="font-weight: 400;">Tweet</b>
                </a>
            </li>
        </ul>
    </div>
</section>