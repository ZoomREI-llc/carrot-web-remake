import { fadeIn, fadeOut, slideUp, slideDown, sessionStorageUTM, trigger } from "./modules/helpers";
import { populateUtms, getRedirectParams } from "./modules/form_helpers";
import { validate } from "./modules/validate";
import { telInputMask } from "./modules/telInputMask";
import { inputSelect } from "./modules/inputSelect";

function leadFormContactCallback() {
    let leadForms = document.querySelectorAll('.lead-form-final:not(.is-initialized)')
    if(!leadForms.length){
        return;
    }
    leadForms.forEach(function (leadForm) {
        let leadFormConfig = JSON.parse(document.getElementById('form-config-'+leadForm.id).innerHTML)
        let phoneInput = leadForm.querySelector('[data-validation="tel-mask"]')
        let formName = leadForm.closest('[data-form-name]') ? leadForm.closest('[data-form-name]').dataset.formName : leadForm.name
        let showHideContainer = leadForm.closest('section') || leadForm
        let showOnSuccess = showHideContainer.querySelector('.show-on-success')
        let hideOnSuccess = showHideContainer.querySelector('.hide-on-success')

        leadForm.classList.add('is-initialized')

        function sendAjax() {
            let xhr = new XMLHttpRequest();
            let formData = populateUtms(leadForm, new FormData(leadForm));
            let formBtn = leadForm.querySelector('[type="submit"]');

            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "submitStep1",
                formName: formName,
                fullName: formData.get('fullName'),
                street: formData.get('street'),
                city: formData.get('city'),
                state: formData.get('state'),
                country: "US",
                zipcode: formData.get('zipcode'),
                email: formData.get('email'),
                phone: formData.get('phone')
            });
            trigger(leadForm, 'lead-form-final-submit')

            if (formBtn) {
                formBtn.classList.add('is-loading');
                formBtn.setAttribute('disabled', 'disabled');
            }

            formData.append('webhooks', JSON.stringify(leadFormConfig.webhooks))
            xhr.open('post', leadFormConfig.handler);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    if(leadFormConfig.redirect) {
                        let redirectParams = getRedirectParams(formData, leadFormConfig.query)

                        document.location.href = leadFormConfig.redirect + (redirectParams ? '?'+redirectParams : '')
                    }

                    if(hideOnSuccess){
                        fadeOut(hideOnSuccess, 300, function () {
                            if(showOnSuccess) {
                                fadeIn(showOnSuccess, 300)
                            }
                        })
                    } else if(showOnSuccess){
                        fadeIn(showOnSuccess, 300)
                    }

                    trigger(leadForm, 'lead-form-final-success')
                }
            };
            xhr.send(formData);
        }
        function initAddress() {
            let addressInput = leadForm.querySelector('[data-validation="address-autocomplete"]')
            let addressInputBtn = leadForm.querySelector('[type="submit"]')
            let autocomplete = new google.maps.places.Autocomplete(addressInput, {
                types: ["address"],
                componentRestrictions: { country: "us" },
            });
            let inputStreet = leadForm.querySelector('[name="street"]')
            let inputCity = leadForm.querySelector('[name="city"]')
            let inputState = leadForm.querySelector('[name="state"]')
            let inputZipcode = leadForm.querySelector('[name="zipcode"]')

            addressInput.autocompleteInstance = autocomplete
            autocomplete.addListener("place_changed", function () {
                if(addressInput.isValid()){
                    inputStreet.value = addressInput.dataset.street
                    inputCity.value = addressInput.dataset.city
                    inputState.value = addressInput.dataset.state
                    inputZipcode.value = addressInput.dataset.zipcode
                }
                trigger(leadForm, 'lead-form-final-interaction')
            });
            if(addressInputBtn) {
                addressInputBtn.addEventListener('click', function (e) {
                    addressInput.closest('.input').classList.remove('is-error')
                })
            }
        }

        function getValuesFromQueue() {
            let getParams = new URLSearchParams(window.location.search)
            let glossary = {
                'full-name': 'fullName',
                'phone': 'phone_masked',
                'propaddress': 'propertyAddress',
                'propstreet': 'street',
                'propcity': 'city',
                'propstate': 'state',
                'propzip': 'zipcode',
            }

            getParams.forEach((value, key) => {
                let input = leadForm.querySelector(`[name="${key}"]`)
                let glossaryInput = leadForm.querySelector(`[name="${glossary[key] ? glossary[key] : ''}"]`)

                if(input){
                    input.value = value
                    if(input.dataset.validation === "tel-mask"){
                        trigger(input, 'input')
                    }
                }
                if(glossaryInput){
                    glossaryInput.value = value
                    if(glossaryInput.dataset.validation === "tel-mask"){
                        trigger(glossaryInput, 'input')
                    }
                }
            })
        }

        telInputMask(phoneInput, {
            mask: '(xxx) xxx - xxxx',
            hiddenInput: true
        })
        validate(leadForm, {
            submitFunction: sendAjax,
            trackErrors: true
        })
        initAddress()
        inputSelect()
        getValuesFromQueue()
    })
}

document.addEventListener("DOMContentLoaded", function () {
    sessionStorageUTM()

    loadScript(`https://maps.googleapis.com/maps/api/js?key=${formConfig.googleMapsApiKey}&libraries=places`, leadFormContactCallback);
});