<div class="cookie-banner-consent">
    <div class="cookie-banner-consent__wrapper">
        <div class="cookie-banner-consent__title title-3">
            <span>We value your privacy</span>
        </div>
        <div class="cookie-banner-consent__text">
            <p>We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking “Accept”, you consent to our use of cookies.</p>
        </div>
        <div class="cookie-banner-consent__accordion">
            <button type="button" class="cookie-banner-consent__accordion-btn">Customize</button>
            <div class="cookie-banner-consent__list">
                <label class="input-checkbox">
                    <input type="checkbox" name="analytics_storage" <?= isset($_COOKIE['analyticsConsent']) && $_COOKIE['analyticsConsent'] === 'granted' ? 'checked' : '' ?>>
                    <span>Analytics</span>
                </label>
                <label class="input-checkbox">
                    <input type="checkbox" name="ad_storage" <?= isset($_COOKIE['adStorageConsent']) && $_COOKIE['adStorageConsent'] === 'granted' ? 'checked' : '' ?>>
                    <span>Storage of advertising data</span>
                </label>
                <label class="input-checkbox">
                    <input type="checkbox" name="ad_user_data" <?= isset($_COOKIE['adUserDataConsent']) && $_COOKIE['adUserDataConsent'] === 'granted' ? 'checked' : '' ?>>
                    <span>Processing of user data</span>
                </label>
                <label class="input-checkbox">
                    <input type="checkbox" name="ad_personalization" <?= isset($_COOKIE['adPersonalizationConsent']) && $_COOKIE['adPersonalizationConsent'] === 'granted' ? 'checked' : '' ?>>
                    <span>Personalization of advertising</span>
                </label>
            </div>
        </div>
        <div class="cookie-banner-consent__buttons">
            <div class="cookie-banner-consent__button">
                <button type="button" class="green-btn js-button-accept">Accept all</button>
            </div>
            <div class="cookie-banner-consent__button">
                <button type="button" class="green-btn green-btn--transparent js-button-save" data-selected="Save" data-not-selected="Reject all">Reject all</button>
            </div>
        </div>
    </div>
    <button type="button" class="cookie-banner-consent__close" aria-label="Close" title="Close"></button>
</div>
<button type="button" class="cookie-banner-consent-btn btn btn--transparent" title="Cookie Settings" alt="Cookie Settings">
    <svg fill="#ffffff" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 299.049 299.049" xml:space="preserve">
        <path d="M289.181,206.929c-13.5-12.186-18.511-31.366-12.453-48.699c1.453-4.159-0.94-8.686-5.203-9.82
            c-27.77-7.387-41.757-38.568-28.893-64.201c2.254-4.492-0.419-9.898-5.348-10.837c-26.521-5.069-42.914-32.288-34.734-58.251
            c1.284-4.074-1.059-8.414-5.178-9.57C184.243,1.867,170.626,0,156.893,0C74.445,0,7.368,67.076,7.368,149.524
            s67.076,149.524,149.524,149.524c57.835,0,109.142-33.056,133.998-83.129C292.4,212.879,291.701,209.204,289.181,206.929z
             M156.893,283.899c-74.095,0-134.374-60.281-134.374-134.374S82.799,15.15,156.893,15.15c9.897,0,19.726,1.078,29.311,3.21
            c-5.123,29.433,11.948,57.781,39.41,67.502c-9.727,29.867,5.251,62.735,34.745,74.752c-4.104,19.27,1.49,39.104,14.46,53.365
            C251.758,256.098,207.229,283.899,156.893,283.899z"/>
        <path d="M76.388,154.997c-13.068,0-23.7,10.631-23.7,23.701c0,13.067,10.631,23.7,23.7,23.7c13.067,0,23.7-10.631,23.7-23.7
            C100.087,165.628,89.456,154.997,76.388,154.997z M76.388,187.247c-4.715,0-8.55-3.835-8.55-8.55s3.835-8.551,8.55-8.551
            c4.714,0,8.55,3.836,8.55,8.551S81.102,187.247,76.388,187.247z"/>
        <path d="M173.224,90.655c0-14.9-12.121-27.021-27.02-27.021s-27.021,12.121-27.021,27.021c0,14.898,12.121,27.02,27.021,27.02
            C161.104,117.674,173.224,105.553,173.224,90.655z M134.334,90.655c0-6.545,5.325-11.871,11.871-11.871
            c6.546,0,11.87,5.325,11.87,11.871s-5.325,11.87-11.87,11.87S134.334,97.199,134.334,90.655z"/>
        <path d="M169.638,187.247c-19.634,0-35.609,15.974-35.609,35.61c0,19.635,15.974,35.61,35.609,35.61
            c19.635,0,35.61-15.974,35.61-35.61C205.247,203.221,189.273,187.247,169.638,187.247z M169.638,243.315
            c-11.281,0-20.458-9.178-20.458-20.46s9.178-20.46,20.458-20.46c11.281,0,20.46,9.178,20.46,20.46
            S180.92,243.315,169.638,243.315z"/>
    </svg>
</button>