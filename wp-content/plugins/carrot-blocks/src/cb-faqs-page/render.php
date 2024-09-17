<?php

$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
$formId7 = isset($attributes['formId7']) ? esc_attr($attributes['formId7']) : '1';
$formId16 = isset($attributes['formId16']) ? esc_attr($attributes['formId16']) : '1';
$selected_market = esc_html($attributes['selectedMarket']);
$selectedName = ($selected_market === 'San Francisco') ? 'John' : 'Chris';
$brand_name = ($selected_market === 'San Francisco') ? 'John Buys Bay Area Houses' : 'Chris Buys Homes in ' . $selected_market;



$answer_img_url = esc_url(plugins_url('src/cb-faqs-page/assets/logo.webp', dirname(__FILE__, 2)));

$faqs = array(
    array(
        "paramId" => "id-1",
        "question" => "Who Are You?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2 >1. Who Are You?</h2>
                     <p>I am $selectedName, and my company is called $brand_name. Of course, I have a team that consists of our most excellent people in the business: acquisitions manager, transaction coordinator, closing officer, contractors, and more!</p>
                     <p >Our “<strong><a href='/our-company'>About Us</a></strong>” page will give you a very detailed picture of who we are. Visit that page now, come in and get to know my company a little bit. We are accomplished, honest, and pleasant.</p>
                     "
    ),
    array(
        "paramId" => "id-2",
        "question" => "What Do You Do?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "<h2>2. What Do You Do?</h2>
                     <p>We Pay Cash For Houses In  $selected_market, in any condition, or location. That is the gist of it. We are the ideal alternative if you need to sell your house without wanting to deal with the hassles of traditional listings. Even if time is not much of an issue, but still would like to avoid the expenses and annoyances of listing your house for sale here in $selected_market with an agent, we are the perfect option.</p>
                     "
    ),
    array(
        "paramId" => "id-3",
        "question" => "Is A “Cash Home Buying” Company Right For Me?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                      <h2>3. Is A “Cash Home Buying” Company Right For Me??</h2>
                      <p>Believe it or not, the majority of sellers we have purchased houses in  $selected_market from were not desperate to sell (at all), nor were they trying to escape foreclosure. Most of our clients choose us simply because they either have had bad experiences with listing their house with an agent, or they just don’t want to deal with repairs, constant walk-throughs, or any hassle one experiences selling a house the traditional way.</p>
                      <p>Because we buy houses in any condition, as-is, no matter the circumstance, location or issue you facing (if any), we often are a great option to consider to sell quickly, and with ease.</p>
                      <p>Let us figure out the numbers and how much we can offer you in cash for your home, and we will advise you if listing with an agent would be a better choice or not. After all, it doesn’t hurt to get an offer from us, our offers are completely free without any obligation to accept!</p>
                     "
    ),
    array(
        "paramId" => "id-4",
        "question" => "Why Should I Choose You?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                      <h2>4. Why Should I Choose You?</h2>
                      <p>Honestly, you absolutely do not have to choose us!</p>
                      <p>We are not desperate. We do not need to make a huge profit on each deal. By all means, do not let me tell you why you should choose us.</p>
                      <h4>I will however tell you how we are different from the rest:</h4>
                      <h3>We Are The Top Ranking Home Buyers In $selected_market !</h3>
                      <p>I know, I know, everyone says this, but I am sure you saw this yourself when you found us online at the top of Google! What does this mean? It means many people that have dealt with us loved us. We do what we say and go through with the transaction. We are a popular choice.</p>
                      <h3>We focus on you!</h3>
                      <p>Let’s make sure you get cash for your house. Whether <em>we</em> buy your  $selected_market house for cash, or another company that we have vetted, spoken to, trust and trained, gives you a higher offer, you can be certain you get the highest offer on your house! Isn’t that nice of us?!</p>
                      <h4>So no, you do not have to choose us, but if you do want to choose us, just fill in this form and we will take care of you.</h4>
                      <p>We are genuine and we are honest and we care. We are investors. Of course, we need to make money, but that doesn’t mean it has to be at your expense, and that doesn’t mean we cannot go out of our way to genuinely help you without expecting anything in return!</p>
                     "
    ),
    array(
        "paramId" => "id-5",
        "question" => "Will You List My House On The MLS?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                    <h2>5. Will You List My House On The MLS?</h2> 
                    <p>We will not list your house on the MLS. We are not agents. Our intention is to buy your house in cash, and rehab it in case any work needs to be done on it and sell it again at a profit or rent it. We have many solutions to buying your house, including seller financing and other creative financing options, and of course buying it for cash. All this ensures you will get your house sold fast!</p>
                   "
    ),
    array(
        "paramId" => "id-6",
        "question" => "How Are You Different From a Real Estate Agent?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                    <h2>6. How Are You Different From a Real Estate Agent?</h2> 
                    <p>A real estate agent does not actually buy your house. Agents market your house on the Multiple Listing Service (MLS), in hopes a buyer will be interested. Agents charge commissions and fees. Listing your house in $selected_market with an agent means you pay closing costs, title fees, and have to tolerate countless of walkthroughs while the house is on the market which can be a long time.</p>
                    <p>We are direct cash buyers with the ability to buy your house and connections to other cash buyers interested in buying houses, rehab them, and put it back on the market for sale for a profit. We are cash buyers and investors. We are the ones actually buying your house. We skip the entire “agent” process and jump immediately to the offer and closing on your property you have for sale in $selected_market. We cover the conventional expenses associated with selling a house like closing costs and inspections. The most notable difference is that we do not charge you any fees or commissions. As mentioned, we skip the entire “agent” process.</p>
                   "
    ),
    array(
        "paramId" => "id-7",
        "question" => "Should I Just List My House in $selected_market With an Agent?",
        "formId" => "$formId7",
        "answerImg" => "",
        "answer" => "
                    <h2>7. Should I Just List My House in $selected_market With an Agent?</h2> 
                    <p>Honestly, we do not know… (yet)! We would need to better understand the condition of your house, your situation, your timeline, your location your expectations, needs, and requirements for us to give you a solid answer. And we are happy to provide you with our professional recommendation.</p>
                    <p>Many people do not understand the advantages and <a href='https://www.trulia.com/voices/Home_Selling/What_are_the_pros_and_cons_of_flat_fee_MLS_listing-108805'>disadvantages of listing a house on the MLS</a>. We would love to help you with this. If you would like that answer now, just fill in our form below and we will get in touch with you with what we believe is your best course of action concerning selling your house in $selected_market.</p>
                   "
    ),
    array(
        "paramId" => "id-8",
        "question" => "How Do I Sell My House Fast For Cash?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>8. How Do I Sell My House Fast For Cash?</h2>
                     <p>Simply tell us a bit about your house. With this information, we will do a market analysis on your house that will be used to present you with an all-cash offer super quickly! If you accept that offer all there is left to do is receive your money at closing.</p>
                     <p>For more information&nbsp;visit&nbsp;our “<strong><a href='/how-we-buy-houses'>How Do I Sell My House</a></strong>“ page if you have not done so already.</p>
                   "
    ),
    array(
        "paramId" => "id-9",
        "question" => "Are There Any Obligations After I Fill The Form?",
        "formId" => "",
        "answerImg" => "`$answer_img_url`",
        "answer" => "
                    <h2>9. Are There Any Obligations After I Fill The Form?</h2> 
                    <p>There are no obligations, at all. We understand that you have options. We know there are people out there eager to scam you, and eager to take advantage of you and your situation. To distinguish ourselves from those, we make sure you know there are no costs to you. You truly and absolutely have nothing to lose. We make you an offer and if you accept the offer, great! You will get your cash quickly. If you do not accept the offer we will do our best to guide you in the right direction.</p>
                   "
    ),
    array(
        "paramId" => "id-10",
        "question" => "Do I Need To Clean Before I Move Out?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>10. Do I Need To Clean Before I Move Out?</h2>
                     <p>Nope. Don’t worry about anything. Take whatever it is you want to take and leave the rest. And we mean it. Food in the fridge, clothes on the floor, mattresses, desks, furniture. Believe me when we say we have seen it all. So why not make things easier and just take what you don’t want to part with and let us deal with the rest?</p>
                     <p>If you wondered what we do with all that stuff, in most cases, any items that are in a decent condition we donate to one of the local charities we work with.</p>
                   "
    ),
    array(
        "paramId" => "id-11",
        "question" => "Are There Any Fees or Commissions to Work With You?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>11. Are There Any Fees or Commissions to Work With You?</h2>
                     <p>There is no money out of your pocket. All fees are paid by us (we get it back when we sell the rehabbed house to another buyer). Also, keep in mind that since we buy so many houses, our title company gives us the best rates due to the huge amount of business we bring them.</p>
                   "
    ),
    array(
        "paramId" => "id-12",
        "question" => "Do You Pay Fair Prices For Properties?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>12. Do You Pay Fair Prices For Properties?</h2>
                     <p>Very good question. Yes, we definitely pay fair prices. But please know there is a difference between a fair price and full market value. If the house is in bad shape, we take the full market value of the house and subtract all the cost of repairs needed and we come up with a number that obviously is a fair price. In some special cases, we can present highly competitive offers at market value. However, usually, those cases do not allow us to pay all cash. Seller financing is one option when a cash offer cannot work.</p>
                   "
    ),
    array(
        "paramId" => "id-13",
        "question" => "My House is in Terrible Condition, Will You Still Buy It?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>13. My House is in Terrible Condition, Will You Still Buy It?</h2>
                     <p>We buy homes in $selected_market in any condition, good or bad. We are mainly rehabbers, so the more room for improvement, the more attractive your house is to us. So, Yes, absolutely! We’d love to buy your house even if it is in bad shape, and you may be surprised by how much we will offer for your house! Just fill in our form and see how much we will offer you in cash for your house!</p>
                   "
    ),
    array(
        "paramId" => "id-14",
        "question" => "How Do You Determine The Price To Offer For My House?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>14. How Do You Determine The Price To Offer For My House?</h2>
                     <h4 class='cb-faqs__answer--step-title'>1. We Determine The Market Value Of Your Home In $selected_market</h4>
                     <p>It all starts with a <a href='https://www.thebalance.com/comparative-market-analysis-in-real-estate-2866366'>CMA (Comparable Market Analysis)</a>. We look at all the houses that have been recently sold within a 1 mile radius of your house and are very similar (comparable) to your house, (same square footage, number of beds/baths, etc.).</p>
                     <p>We then look at their sold price. This gives us a very<a href='http://www.realtor.com/advice/sell/assessed-value-vs-market-value-difference/'> accurate market value of your house</a>, <strong><em>if</em></strong> your house is in the exact same condition of these other houses that have been sold.</p>
                     <h4 class='cb-faqs__answer--step-title'>2. We Determine The Cost Of Repairs</h4>
                     <p>The cost of repairs is the cost associated with bringing your house to a very similar condition as all the other houses in your area that are similar to yours that have recently been sold. During the walkthrough, we note what needs to be repaired. We do this with the help of our trusted contractors. We want to keep the costs down so we only repair what we really have to repair.</p>
                     <p>Keeping the cost down ensures the highest offer we can present to you.</p>
                     <h4 class='cb-faqs__answer--step-title'>3. We Make You An Offer</h4>
                     <p>Based on our findings which we share with you, we present you with our offer. Because we are transparent we explain in full detail how we come up with the offer and show you the repairs and the CMA of your market. The offer is a no-obligation offer. You can either accept the offer or decline it without any cost to you.</p>
                     <p>If you accept the offer we can discuss a closing date where you will receive your cash and be completely done with the house! Congratulations, you just sold your house without any hassle, fees, or commissions.</p>
                   "
    ),
    array(
        "paramId" => "id-15",
        "question" => "How Many Houses Do You Buy And What Will You Do With My House?",
        "formId" => "",
        "answerImg" => "",
        "answer" => "
                     <h2>15. How Many Houses Do You Buy And What Will You Do With My House?</h2>
                     <p>We buy many houses, much more than any homeowner, and also more than most of the other investors in $selected_market. We average 10 to 15 houses per month, depending on the time of the year.</p>
                    <br>
                     <h4 class='cb-faqs__answer--step-title'>What do we do with so many houses?</h4>
                     <p>We either rehab them and then sell to homeowners that are looking to buy a move-in ready, fixed up house with all the modern upgrades, or we rehab and then hold them as rentals, providing affordable housing for people who are looking to rent.</p>
                     <h4 class='cb-faqs__answer--step-title'>How can you deal with so many houses at the same time?</h4>
                     <p>We have a department in our business that focuses just on the rehabs and construction of houses. But even then, there are times where too many homeowners want us to buy their house, and we are just too busy with our existing projects.</p>
                     <p>This is why we came up with a great solution! instead of telling the homeowners that we are too busy with our existing projects, we will still buy their house. At this point, we will be partnering with other investors that we know and trust, and they will handle the construction side of things while we take care of the purchase, and in the end, once we sold the house, we split the profit and everyone are happy 😊.</p>
                   "
    ),
    array(
        "paramId" => "id-16",
        "question" => "How Do I Get Started And Get My Free No-Obligation All-Cash Offer?",
        "formId" => "$formId16",
        "answerImg" => "",
        "answer" => "
                     <h2>16. How Do I Get Started And Get My Free No-Obligation All-Cash Offer?</h2>
                     <p>It is a very simple answer to this question, just fill in the form below or call us at <a href='tel:$phoneNumber' style='color: #02bdfc'>$phoneNumber</a> 😊</p>
                   "
    ),
);
?>



<section id='cb-faqs--start' class="cb-faqs">
    <div class="cb-faqs__header">
        <h1>Frequently Asked Questions</h1>
        <hr class="cb-faqs__header--separator">
        <p>We have formulated a list of frequently asked questions so you can read through them. If your question is not listed please feel free to call us at <a href="tel:<?php echo $phoneNumber; ?>" style="color: #02bdfc"><?php echo $phoneNumber; ?></a> or fill in the contact us form below, and we will try to answer any and all questions you may have.</p>
        <hr class="cb-faqs__header--separator">
    </div>
    <ol id="cb-faqs-questions-block" class="cb-faqs__questions-block">
        <?php foreach ($faqs as $faq) : ?>
            <li class="cb-faqs__questions-block--item">
                <a href='#<?php echo esc_html($faq['paramId']); ?>'><?php echo esc_html($faq['question']); ?></a>
            </li>
        <?php endforeach; ?>
    </ol>


    <div class="cb-faqs__answer-block">
        <?php foreach ($faqs as $faq) : ?>
            <div class="cb-faqs__answer-block--item">
                <hr class="cb-faqs__answer--separator">
                <div id='<?php echo esc_html($faq['paramId']); ?>'>
                    <?php echo wp_kses_post($faq['answer']); ?>

                    <?php if ($faq['answerImg'] != '') {  ?>
                        <img class="" src="<?php echo esc_url($faq['answerImg']); ?>" />
                    <?php } else {
                    } ?>

                    <?php if ($faq['formId'] != '') {  ?>
                        <div class="cb-faqs__form-wrapper">
                            <?php echo do_shortcode('[gravityform id="' . $faq['formId'] . '" title="false" ajax="true"]'); ?>
                        </div>
                    <?php } else {
                    } ?>

                </div>
            </div>
            <a class="cb-faqs-btn-back-to-top" href="#cb-faqs--start">Back to Top</a>
        <?php endforeach; ?>
    </div>
</section>