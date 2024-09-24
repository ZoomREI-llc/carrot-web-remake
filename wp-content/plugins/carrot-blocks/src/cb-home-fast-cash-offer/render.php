<?php
$selected_city = esc_html($attributes['selectedCity']);
$phone_number = esc_html($attributes['phoneNumber']);

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';

$bbb_url = esc_url(plugins_url('src/cb-home-fast-cash-offer/assets/bbb.png', dirname(__FILE__, 2)));
$checkmark_url = esc_url(plugins_url('src/cb-home-fast-cash-offer/assets/checkmark.svg', dirname(__FILE__, 2)));
?>

<style>
    :root {
        <?php
        // Set '--show-select' for 'Indianapolis', 'Cleveland', and 'Detroit'
        if (in_array($selected_city, ['Indianapolis', 'Cleveland', 'Detroit'])) {
            echo '--show-select: none;';
        }

        // Set '--set-custom-form-field-width' for 'San Francisco', 'St. Louis', 'Cleveland', and 'Detroit'
        if (in_array($selected_city, ['San Francisco', 'St. Louis', 'Cleveland', 'Detroit'])) {
            echo '--set-custom-form-field-width: span 2;';
        }
        ?>--checkmark-url: url('<?php echo $checkmark_url; ?>');

    }
</style>


<section class="cb-home-fast-cash-offer__full-width">
    <div class="cb-home-fast-cash-offer">
        <h2>
            The Fastest Cash Offer You’ll Ever Receive <br>(and also the Best!)
        </h2>
        <div class="cb-home-fast-cash-offer__content">
            <div class="cb-home-fast-cash-offer__text">
                <span>Ready to hear more? fill out the form to:</span>
                <ul>
                    <li>
                        Get a quick cash offer on your house – we’re not wasting time!
                    </li>
                    <li>Sell your house to a local home buyer</li>
                    <li>Choose your closing date</li>
                    <li>Avoid Inspections and Repairs</li>
                </ul>
                <p class="cb-home-fast-cash-offer__hassle-free">
                    What if you can get rid of your house today? Hassle-Free
                </p>
                <p class="cb-home-fast-cash-offer__forget">
                    Forget about paying commissions and fees, forget about making
                    costly repairs and going through inspections, forget what you
                    knew about selling a house – We offer the easy way!
                </p>
            </div>
            <div class="cb-home-fast-cash-offer__form-block">
                <div class="cb-home-fast-cash-offer__form-block--text">
                    <?php if ($selected_city === 'Kansas City'): ?>
                        <!-- Short content for Kansas City -->
                        <span>We buy houses in ANY CONDITION in <?php echo $selected_city; ?>. There are no commissions or fees and no obligation whatsoever.
                            For the fastest service, call us now <a href="tel:<?php echo $phone_number; ?>" style="color: #02bdfc"><?php echo $phone_number; ?></a></span>

                    <?php elseif (in_array($selected_city, ['St. Louis', 'Detroit', 'Cleveland', 'Indianapolis'])): ?>
                        <!-- Custom content for specified cities -->
                        <div class="custom-form-content">
                            <h3>What Do You Have To Lose? Get Started Now...</h3>
                            <?php if ($selected_city === 'Indianapolis'): ?>
                                <!-- BBB logo and link for Indianapolis -->
                                <a href="/legitimate-home-buyers-in-indianapolis/#BBB">
                                    <img class="cb-home-hero__bbb-logo"
                                        src="<?php echo esc_url($bbb_url); ?>"
                                        alt="" />
                                </a>
                            <?php elseif ($selected_city === 'St. Louis'): ?>
                                <!-- BBB logo and link for St. Louis -->
                                <a href="/legitimate-house-buyers-in-st-louis/#BBB">
                                    <img class="cb-home-hero__bbb-logo"
                                        src="<?php echo esc_url($bbb_url); ?>"
                                        alt="" />
                                </a>
                            <?php endif; ?>
                            <span>We buy houses in any condition. No realtors, no fees, no repairs, no cleaning.
                                <span style="color: rgb(2, 189, 252); font-weight: 700;"> Find Out How Much We Can Offer For Your House!</span>
                            </span>
                            <h4>Get a solid offer today!</h4>
                        </div>

                    <?php elseif ($selected_city === 'San Francisco'): ?>
                        <!-- Only form for San Francisco -->
                        <!-- No text content, form below will be displayed -->

                    <?php else: ?>
                        <!-- Default content for other cities -->
                        <span>We buy houses in ANY CONDITION in <?php echo $selected_city; ?>. There are no commissions or fees and no obligation whatsoever.
                            For the fastest service, call us now <a href="tel:<?php echo $phone_number; ?>" style="color: #02bdfc"><?php echo $phone_number; ?></a></span>
                    <?php endif; ?>
                </div>
                <div class="cb-home-fast-cash-offer__form-wrapper">
                    <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>