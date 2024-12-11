<?php
$btnText = isset($attributes['btnText']) ? esc_html($attributes['btnText']) : '';
$short_id = substr(wp_generate_uuid4(), 0, 8);
$form_config = [
    "handler" => "/wp-json/custom/v1/lead-form-v2",
    "redirect" => $attributes['redirectUrl'],
    "webhooks" => $attributes['webhooks'],
    "query" => $attributes['redirectQuery']
];
?>
<script type="application/json" id="form-config-<?= $short_id ?>"><?= json_encode($form_config) ?></script>

<form id="<?= $short_id ?>" name="form-step-2" class="lead-form-final" data-submit-event="submitStep2" method="POST" style="--loader-gif: url('<?php echo get_image_url('form-step-2/loader'); ?>');">
    <input type="hidden" name="entry_id" value="<?= $short_id ?>" autocomplete="off">
    <input type="hidden" name="street" value="" autocomplete="off">
    <input type="hidden" name="city" value="" autocomplete="off">
    <input type="hidden" name="state" value="" autocomplete="off">
    <input type="hidden" name="zipcode" value="" autocomplete="off">
    <input type="hidden" name="country" value="US" autocomplete="off">

    <div class="lead-form-final__section">
        <div class="lead-form-final__title">
            <h2>Property Information</h2>
        </div>

        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="bedrooms">Number of Bedrooms <span style="color: #FF0000">*</span></label>
                <select id="bedrooms" name="bedrooms" required>
                    <option value="">Choose number of bedrooms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6+">6+</option>
                </select>
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="bathrooms">Number of Bathrooms <span style="color: #FF0000">*</span></label>
                <select id="bathrooms" name="bathrooms" required>
                    <option value="">Choose number of bathrooms</option>
                    <option value="1">1</option>
                    <option value="1.5">1.5</option>
                    <option value="2">2</option>
                    <option value="2.5">2.5</option>
                    <option value="3">3</option>
                    <option value="3.5">3.5</option>
                    <option value="4">4</option>
                </select>
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="garage">Garage</label>
                <select id="garage" name="garage">
                    <option value="" selected="selected">Please select one of the options</option><option value="Attached Garage">Attached Garage</option><option value="Detached Garage">Detached Garage</option><option value="Car Port">Car Port</option><option value="Driveway">Driveway</option><option value="No Parking">No Parking</option><option value="Other">Other</option>
                </select>
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="basement">Basement</label>
                <select id="basement" name="basement">
                    <option value="" selected="selected">Please select one of the options</option><option value="Full Basement">Full Basement</option><option value="Partial Basement">Partial Basement</option><option value="No Basement">No Basement</option>
                </select>
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="owned">How long have you owned the property?</label>
                <input type="text" name="owned" id="owned">
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="condition">What is the current condition of the property? <span style="color: #FF0000">*</span></label>
                <select id="condition" name="condition" required>
                    <option value="" selected="selected">Please select one of the options</option><option value="Excellent">Excellent</option><option value="Good">Good</option><option value="Fair">Fair</option><option value="Poor">Poor</option><option value="Terrible">Terrible</option>
                </select>
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="repairs">What kind of repairs and maintenance does the house need?</label>
                <input type="text" name="repairs" id="repairs" placeholder="Please type your answer here">
                <div class="input__message"></div>
            </div>
        </div>

        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="living">Is there anyone living in the house? <span style="color: #FF0000">*</span></label>
                <select id="living" name="living" required>
                    <option value="" selected="selected">Please select one of the options</option><option value="Owner Occupied">Owner Occupied</option><option value="Rented">Rented</option><option value="Vacant">Vacant</option><option value="Other">Other</option>
                </select>
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="realtor">Is the house currently listed with a realtor? <span style="color: #FF0000">*</span></label>
                <select id="realtor" name="realtor" required>
                    <option value="" selected="selected">Please select one of the options</option><option value="Yes">Yes</option><option value="No">No</option>
                </select>
                <div class="input__message"></div>
            </div>
        </div>
    </div>

    <div class="lead-form-final__section">
        <div class="lead-form-final__title">
            <h2>Property Owner Situation</h2>
        </div>

        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="fast">Do you need to sell your house fast? <span style="color: #FF0000">*</span></label>
                <select id="fast" name="fast" required>
                    <option value="" selected="selected">Please select one of the options</option><option value="Yes">Yes</option><option value="No">No</option>
                </select>
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="soon">How soon would you like to sell your property?</label>
                <select id="soon" name="soon">
                    <option value="" selected="selected">Please select one of the options</option><option value="ASAP">ASAP</option><option value="30 Days">30 Days</option><option value="60 Days">60 Days</option><option value="90 Days">90 Days</option><option value="120 Days">120 Days</option><option value="Not in a rush">Not in a rush</option>
                </select>
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="price">Asking Price</label>
                <input type="text" name="price" id="price">
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="reason">What is the reason you are selling your house? <span style="color: #FF0000">*</span></label>
                <textarea name="reason" id="reason" required></textarea>
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="goal">What's your ultimate goal with your house? <span style="color: #FF0000">*</span></label>
                <textarea name="goal" id="goal" required></textarea>
                <div class="input__message"></div>
            </div>
        </div>
    </div>

    <div class="lead-form-final__section">
        <div class="lead-form-final__title">
            <h2>Contact Information</h2>
        </div>

        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="fullName">Seller Full Name <span style="color: #FF0000">*</span></label>
                <input type="text" id="fullName" name="fullName" placeholder="Full name" data-validation="name" required>
                <div class="input__message"></div>
            </div>
            <div class="lead-form-final__address address-wrapper input input--rounded">
                <label for="propertyAddress">Property Address <span style="color: #FF0000">*</span></label>
                <input type="text" id="propertyAddress" name="propertyAddress" data-validation="address-autocomplete" autocomplete="off" placeholder="Full Address">
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@mail.com" data-validation="email">
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="phone">Mobile Phone Number <span style="color: #FF0000">*</span></label>
                <input type="tel" id="phone" inputmode="numeric" name="phone" placeholder="(888) 888 - 888" data-validation="tel-mask" required>
                <div class="input__message"></div>
            </div>
        </div>
        <div class="lead-form-final__row">
            <div class="input input--rounded">
                <label for="landline">Landline</label>
                <input type="text" id="landline" name="landline">
                <div class="input__message"></div>
            </div>
            <div class="input input--rounded">
                <label for="bestTime">Best Time to Call</label>
                <select id="bestTime" name="bestTime">
                    <option value="" selected="selected">Please select one of the options</option><option value="Anytime">Anytime</option><option value="Morning">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option>
                </select>
                <div class="input__message"></div>
            </div>
        </div>
    </div>
    

    <div class="lead-form-final__btn">
        <button type="submit" class="green-btn green-btn--arrow cta-btn">
            <?= $btnText ?>
        </button>
    </div>
</form>

<script>
  if(typeof validationErrors === 'undefined') {
    let validationErrors = {
      "required": "This field is required",
      "invalid": "This field is invalid",

      "address-autocomplete": {
        "addressAutocomplete": "Please re-enter and select your address from the dropdown"
      },
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
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    initFormEngine(document.getElementById('<?= $short_id ?>'));
  });
</script>