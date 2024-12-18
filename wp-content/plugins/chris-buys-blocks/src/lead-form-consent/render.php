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

<form id="<?= $short_id ?>" name="lead_form_v2" class="lead-form" data-submit-event="submitStep1" method="POST"  style="--loader-gif: url('<?php echo get_image_url('lead-form-consent/loader'); ?>');">
    <input type="hidden" name="entry_id" value="<?= $short_id ?>" autocomplete="off">
    <input type="hidden" name="street" value="" autocomplete="off">
    <input type="hidden" name="city" value="" autocomplete="off">
    <input type="hidden" name="state" value="" autocomplete="off">
    <input type="hidden" name="zipcode" value="" autocomplete="off">

    <div class="lead-form__address address-wrapper input input--squared">
        <label for="propertyAddress">Full Address</label>
        <input type="text" id="propertyAddress" name="propertyAddress" data-validation="address-autocomplete" autocomplete="off" placeholder="Full Address">
    </div>
    <div class="input input--squared">
        <label for="fullName">Seller Name</label>
        <input type="text" id="fullName" name="fullName" placeholder="Full name" data-validation="name" required>
        <div class="input__message"></div>
    </div>
    <div class="input input--squared">
        <label for="phone">Phone number</label>
        <input type="tel" id="phone" inputmode="numeric" name="phone" placeholder="(888) 888 - 888" data-validation="tel-mask" required>
        <div class="input__message"></div>
    </div>
    <div class="input input--squared">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="example@mail.com" data-validation="email">
        <div class="input__message"></div>
    </div>

    <div class="lead-form__disclaimer small">
        <p>By clicking '<?= $btnText ?>', I agree to receive calls, texts, and recurring emails from Doctor Homes about property sale offers or info. Msg & data rates may apply. Reply STOP to opt out. See our <a href="#terms" data-fancybox>Terms & Conditions</a> and <a href="#privacy" data-fancybox>Privacy Policy</a>.</p>
    </div>
    <div class="lead-form__fields-btn">
        <button type="submit" class="green-btn green-btn--arrow cta-btn">
            <?= $btnText ?>
            <?php echo get_responsive_image('lead-form-consent/cta-arrow', 'Arrow Icon', 'form-btn-arrow'); ?>
        </button>
    </div>
</form>

<div style="display: none">
    <div class="popup popup--text" id="terms">
        <div class="popup__inner">
            <header class="popup__title">
                <span>Terms of Use</span>
            </header>
            <div class="popup__body">
                <h2 class="wp-block-heading">1. Agreement to Terms</h2>
                <p>By accessing and using the website at [<a href="https://www.chrisbuyshomes.com/" target="_blank" rel="noopener">https://www.chrisbuyshomes.com</a>], you acknowledge and agree to comply with these Terms of Use, along with all relevant laws and regulations. It is your responsibility to ensure that your use aligns with any applicable local laws. If you disagree with any part of these terms, you must refrain from using this site. All content and materials on the website are protected under applicable copyright and trademark laws.</p>
                <h2 class="wp-block-heading" id="2.-Limited-License">2. Limited License</h2>
                <p>We grant you a temporary, non-transferable license to download a single copy of the materials from Doctor Homes’ website for personal, non-commercial use only. This is a license to use, not an ownership transfer. Under this license, you agree not to:</p>
    
    
    
                <ul class="wp-block-list">
                    <li>Modify or duplicate the materials in any way.</li>
    
    
    
                    <li>Use the content for commercial gain or public display.</li>
    
    
    
                    <li>Attempt to reverse-engineer or decompile any software found on the website.</li>
    
    
    
                    <li>Remove any copyright, trademark, or proprietary notices.</li>
    
    
    
                    <li>Share the materials with others or host them on other platforms or servers.</li>
                </ul>
    
    
    
                <p>This license will end automatically if you violate any of these conditions, and Doctor Homes may revoke it at any time. If your access or this license is terminated, you are required to delete all copies of downloaded materials, both digital and physical.</p>
    
    
    
                <h2 class="wp-block-heading" id="3.-Disclaimer-of-Warranties">3. Disclaimer of Warranties</h2>
    
    
    
                <p>The content and materials provided on this website are offered “as is” without warranties of any kind. Doctor Homes disclaims all warranties, express or implied, including but not limited to, implied warranties of merchantability, fitness for a particular purpose, and non-infringement of intellectual property rights. We make no promises regarding the accuracy, reliability, or potential results from the use of our website’s materials or any linked content.</p>
    
    
    
                <h2 class="wp-block-heading" id="4.-Limitation-of-Liability">4. Limitation of Liability</h2>
    
    
    
                <p>Doctor Homes and its partners are not liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use the materials on our site. This includes, but is not limited to, loss of data, loss of profits, or interruptions to business operations. These limitations apply even if Doctor Homes or an authorized representative has been notified about the possibility of such damages. Some regions do not allow limits on certain warranties or liabilities, so these provisions may not apply to you.</p>
    
    
    
                <h2 class="wp-block-heading" id="5.-Accuracy-and-Revisions">5. Accuracy and Revisions</h2>
    
    
    
                <p>While we strive to ensure the accuracy of the materials on our website, errors may occur, including technical, typographical, or photographic mistakes. Doctor Homes reserves the right to modify or update content without notice. However, we are not obligated to ensure all information remains current at all times.</p>
    
    
    
                <h2 class="wp-block-heading" id="6.-Links-to-Other-Websites">6. Links to Other Websites</h2>
    
    
    
                <p>Our website may feature links to third-party sites for your convenience. Doctor Homes does not endorse or guarantee the content of these external websites. We are not responsible for the availability, accuracy, or content of any linked site, and accessing them is entirely at your own risk.</p>
    
    
    
                <h2 class="wp-block-heading" id="7.-Changes-to-Terms">7. Changes to Terms</h2>
    
    
    
                <p>Doctor Homes reserves the right to modify these Terms of Use at any time without prior notification. By continuing to use this website, you accept the latest version of these terms. We encourage users to review the terms periodically to stay informed of any updates.</p>
    
    
    
                <h2 class="wp-block-heading" id="8.-Governing-Law">8. Governing Law</h2>
    
    
    
                <p>These terms are governed by and interpreted under the laws of this State. By using our website, you agree to submit to the jurisdiction of the courts in that state or region for any legal matters arising from these terms or your use of the site.</p>
            </div>
            <footer class="popup__footer">
                <button type="button" class="popup__button" data-fancybox-close="">OK</button>
            </footer>
        </div>
    </div>
    
    <div class="popup popup--text" id="privacy">
        <div class="popup__inner">
            <header class="popup__title">
                <span>Privacy Policy</span>
            </header>
            <div class="popup__body">
                <p>This policy explains the types of information we collect when you interact with our website, <a href="https://www.chrisbuyshomes.com/" target="_blank" rel="noopener">https://www.chrisbuyshomes.com</a> (referred to as “the Website”), including its services and content, and how we collect, use, maintain, and protect that information.</p>
                
                <h3 class="wp-block-heading" id="This-Policy-Covers:">This Policy Covers:</h3>
    
    
    
                <ul class="wp-block-list">
                    <li>Information collected through the Website.</li>
    
    
    
                    <li>Information shared via email, text messages, live chat, and other electronic communications.</li>
    
    
    
                    <li>Interactions with our ads on third-party websites that link to this policy.</li>
                </ul>
    
    
    
                <p>This policy does NOT apply to information:</p>
    
    
    
                <ul class="wp-block-list">
                    <li>Collected offline or on other websites or services linked to our Website.</li>
    
    
    
                    <li>Collected by third parties such as social media platforms or recommended service providers, as they may have separate privacy policies.</li>
                </ul>
    
    
    
                <p>By using our services, you agree to this policy. We encourage you to check back regularly, as this policy may be updated. Continued use of our services indicates your acceptance of any changes.</p>
    
    
    
                <h3 class="wp-block-heading" id="Children-Under-the-Age-of-18">Children Under the Age of 18</h3>
    
    
    
                <p>Doctor Homes does not target or knowingly collect personal information from children under 18. If you’re under 18, please do not provide any personal information through the Website. If we discover that information from a child under 18 has been collected, it will be promptly deleted. For any concerns, contact us at contact@chrisbuyshomes.com.</p>
    
    
    
                <h3 class="wp-block-heading" id="Information-We-Collect-and-How-We-Collect-It">Information We Collect and How We Collect It</h3>
    
    
    
                <p>We collect information in two ways:</p>
    
    
    
                <ol start="1" class="wp-block-list">
                    <li><strong>Directly from you</strong> when you provide it during interactions such as registering, filling out forms, requesting a service, or through email, live chat, or phone communication.</li>
    
    
    
                    <li><strong>Automatically</strong> through technology such as cookies, which capture details about your visits to the Website, IP address, and browsing activities.</li>
                </ol>
    
    
    
                <p>The information we collect includes:</p>
    
    
    
                <ul class="wp-block-list">
                    <li>Personal information such as your name, email address, phone number, and details about your property.</li>
    
    
    
                    <li>Financial details like income or savings (to help determine eligibility for our services).</li>
    
    
    
                    <li>Data about your home and the equipment you use to access the Website.</li>
                </ul>
    
    
    
                <h3 class="wp-block-heading" id="Use-of-Your-Information">Use of Your Information</h3>
    
    
    
                <p>We use the information we collect to:</p>
    
    
    
                <ul class="wp-block-list">
                    <li>Provide you with our services and fulfill your requests, such as sending offers or answering inquiries.</li>
    
    
    
                    <li>Personalize your experience on the Website.</li>
    
    
    
                    <li>Help evaluate your property and eligibility for services.</li>
    
    
    
                    <li>Analyze your financial situation for future service offerings.</li>
    
    
    
                    <li>Improve our services and content.</li>
    
    
    
                    <li>Send promotional information if you have subscribed to receive updates.</li>
                </ul>
    
    
    
                <h3 class="wp-block-heading" id="Sharing-Your-Information">Sharing Your Information</h3>
    
    
    
                <p>Your personal information is never sold or traded. We may share it only with:</p>
    
    
    
                <ul class="wp-block-list">
                    <li>Trusted partners who help us operate the Website and serve you, provided they agree to keep your information secure.</li>
    
    
    
                    <li>Credit reporting agencies and affiliates as permitted by law.</li>
    
    
    
                    <li>Legal authorities when required for compliance or to protect our business and users.</li>
                </ul>
    
    
    
                <h3 class="wp-block-heading" id="Use-of-Cookies-and-Other-Tracking-Technologies">Use of Cookies and Other Tracking Technologies</h3>
    
    
    
                <p>We use cookies and similar technologies to enhance your experience, store your preferences, and track usage patterns. You can control cookies through your browser settings, though some features may not function properly if cookies are disabled.</p>
    
    
    
                <p>Third-party providers may also use cookies or web beacons to collect information for targeted advertising. We do not control these technologies and recommend reviewing the privacy policies of any third-party service provider.</p>
    
    
    
                <h3 class="wp-block-heading" id="Your-Privacy-Choices">Your Privacy Choices</h3>
    
    
    
                <p>You have options for controlling your personal information:</p>
    
    
    
                <ul class="wp-block-list">
                    <li>Adjust your browser settings to manage cookies.</li>
    
    
    
                    <li>Opt-out of promotional emails by contacting us at contact@chrisbuyshomes.com.</li>
                </ul>
    
    
    
                <h3 class="wp-block-heading" id="Data-Security">Data Security</h3>
    
    
    
                <p>We take steps to secure your personal information, including using firewalls and encryption where appropriate. While we work hard to protect your data, no internet transmission is 100% secure, so we encourage you to be mindful when sharing sensitive information online.</p>
    
    
    
                <h3 class="wp-block-heading" id="Updates-to-This-Privacy-Policy">Updates to This Privacy Policy</h3>
    
    
    
                <p>We may update this policy from time to time. Any significant changes will be posted on this page with a notice of the update. The last modification date will be shown at the top of the page.</p>
    
    
    
                <h3 class="wp-block-heading" id="Contact-Us">Contact Us</h3>
    
    
    
                <p>For any questions about this privacy policy or our practices, reach out to us at contact@chrisbuyshomes.com.</p>
            </div>
            <footer class="popup__footer">
                <button type="button" class="popup__button" data-fancybox-close="">OK</button>
            </footer>
        </div>
    </div>
</div>
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