<form id="dh-lead-form-multistep" name="lead_form_v2" class="lead-form-multistep" action="/wp-json/custom/v1/submit-form" method="POST" data-redirect="/step-2">
    <input type="hidden" name="street" value="" autocomplete="off">
    <input type="hidden" name="city" value="" autocomplete="off">
    <input type="hidden" name="state" value="" autocomplete="off">
    <input type="hidden" name="zipcode" value="" autocomplete="off">

    <div class="lead-form-multistep__address address-wrapper input">
        <input type="text" name="propertyAddress" data-validation="address-autocomplete" autocomplete="off" placeholder="Enter your property address">
        <button type="button" class="lead-form-multistep__address-btn">
            Get My Offer
            <?php echo get_responsive_image('lead-form-compact/cta-arrow', 'Arrow Icon', 'form-btn-arrow'); ?>
        </button>
    </div>
    <div class="lead-form-multistep__fields" style="display: none">
        <div class="lead-form-multistep__fields-row">
            <div class="input">
                <input type="text" name="fullName" placeholder="Enter your full name" data-validation="name" required>
                <div class="input__message"></div>
            </div>
            <div class="input">
                <input type="tel" inputmode="numeric" name="phone" placeholder="Enter your phone number" data-validation="tel-mask" required>
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-multistep__fields-row">
            <div class="input">
                <input type="email" name="email" placeholder="Enter your email address" data-validation="email">
                <div class="input__message"></div>
            </div>
            <div class="input input--select">
                <input type="text" class="output_text" placeholder="How Did You Hear About Us?" readonly>
                <input type="hidden" class="output_value" name="howDidYouHearAboutUs">
                <div class="input__message"></div>
                <div class="input__dropdown">
                    <ul>
                        <li data-value="TV">TV</li>
                        <li data-value="Radio">Radio</li>
                        <li data-value="Web Search">Web Search</li>
                        <li data-value="Mailer">Mailer</li>
                        <li data-value="Friends or Family">Friends or Family</li>
                        <li data-value="Other">Other</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lead-form-multistep__fields-btn">
            <button type="submit" class="form-submit">
                Get My Offer
                <?php echo get_responsive_image('lead-form/cta-arrow', 'Arrow Icon', 'form-btn-arrow'); ?>
            </button>
        </div>
    </div>
</form>

<script>
    let validationErrors = {
        "required": "This field is required",
        "invalid": "This field is invalid",

        "email": {
            "regex": "The E-mail must be a valid email address.",
            "required": "E-mail is required."
        },
        "name": {
            "required": "Please enter your full name."
        },
        "tel-mask": {
            "required": "Please enter your phone number.",
            "telMask": "Phone number is invalid."
        },
    }
</script>