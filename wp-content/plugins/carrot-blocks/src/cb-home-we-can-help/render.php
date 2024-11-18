<?php
$first_market_mention = esc_html($attributes['firstMarketMention']);
$second_market_mention = esc_html($attributes['secondMarketMention']);
$avoid_commissions_link = esc_url($attributes['avoidCommissionsLink']);

?>

<section id="cb-home-we-can-help" class="cb-home-we-can-help">
    <h2>
        We Buy Houses No Matter What Condition They Are In And What Your
        Situation Is – WE CAN HELP
    </h2>
    <p>
        Selling your property fast in <?php echo $first_market_mention; ?> is not always an easy task.
        You need to deal with inspectors, showings, requested repairs by
        buyers, staging the house, keeping the house clean and paying
        commissions, closing costs, and other fees involved. We understand
        that
        <strong>selling a property in the traditional way is not for
            everyone</strong>, and this is why we came up with our service.
    </p>
    <p>
        Avoid <a href="<?php echo $avoid_commissions_link; ?>">agent commissions</a>, closing costs, walk-throughs, open houses, uncertainties, or costly
        repairs. <strong>We buy homes in <?php echo $second_market_mention; ?></strong> no matter what
        your reasons for selling are:
    </p>
    <div class="cb-home-we-can-help__reasons">
        <div class=".cb-home-we-can-help-col-1">
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Inherited a House</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Tired of Being a Landlord</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Too Many Costly Repairs</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Behind on Payments</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Hoarder Houses</span>
            </div>
        </div>
        <div class="col-2">
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Need To Relocate</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Vacant Houses</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Elderly in Need of Assisted Living</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Sell Old House To Buy A New Place</span>
            </div>
            <div class="cb-home-we-can-help-reason ">
                <?php echo cb_get_responsive_image('cb-home-we-can-help/circled-checkmark', 'checkmark', 'checkmark-icon'); ?>
                <span>Going Through a Divorce</span>
            </div>
        </div>
    </div>
    <p>
        We’ve helped homeowners that wanted to sell due to each of the above
        reasons (and many more!), and we would love to help you too!
    </p>
</section>