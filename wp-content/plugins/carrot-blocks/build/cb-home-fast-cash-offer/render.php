<?php
$selected_city = esc_html($attributes['selectedCity']);
$phone_number = esc_html($attributes['phoneNumber']);

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';
?>

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
                    <span>We buy houses in ANY CONDITION in <?php echo $selected_city; ?>. There are no commissions or fees and no obligation whatsoever.
                        For the fastest service, call us now <a href="tel:<?php echo $phone_number; ?>" style="color: #02bdfc"><?php echo $phone_number; ?></a></span>
                </div>
                <div class="cb-home-fast-cash-offer__form-wrapper">
                    <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>