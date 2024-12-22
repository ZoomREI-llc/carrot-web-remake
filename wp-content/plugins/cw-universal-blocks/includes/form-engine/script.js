import { fadeIn, fadeOut, slideUp, slideDown, sessionStorageUTM, trigger } from "./modules/helpers.js";
import { populateUtms, getRedirectParams } from "./modules/form_helpers.js";
import { validate } from "./modules/validate.js";
import { telInputMask } from "./modules/telInputMask.js";
import { inputSelect } from "./modules/inputSelect.js";

function formEngineCallback(leadForm) {
  let leadFormConfig = JSON.parse(document.getElementById('form-config-'+leadForm.id).innerHTML)
  let phoneInputs = leadForm.querySelectorAll('[data-validation="tel-mask"]')
  let formName = leadForm.closest('[data-form-name]') ? leadForm.closest('[data-form-name]').dataset.formName : leadForm.name
  let isPopup = leadForm.closest('[data-form-popup]')
  let showHideContainer = leadForm.closest('section') || leadForm
  let showOnSuccess = showHideContainer.querySelector('.show-on-success')
  let hideOnSuccess = showHideContainer.querySelector('.hide-on-success')

  leadForm.classList.add('is-initialized')

  function sendAjax() {
    let xhr = new XMLHttpRequest();
    let formData = populateUtms(leadForm, new FormData(leadForm));
    let formBtn = leadForm.querySelector('[type="submit"]');

    if(leadForm.dataset.submitEvent) {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        event: leadForm.dataset.submitEvent,
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
    }
    trigger(leadForm, 'form-submit')

    if (formBtn) {
      formBtn.classList.add('is-loading');
      formBtn.setAttribute('disabled', 'disabled');
    }

    formData.append('webhooks', JSON.stringify(leadFormConfig.webhooks))
    formData.append('form_name', formName)
    formData.append('popup', !!isPopup)

    xhr.open('post', leadFormConfig.handler);
    xhr.onload = function() {
      let data = xhr.responseText

      try {
        data = JSON.parse(data)
        data = data['responseJSON'] || data['data'] || data
      } catch (error) {}

      if (xhr.status === 200) {
        if(leadFormConfig.redirect) {
          let redirectParams = getRedirectParams(formData, leadFormConfig.query)

          document.location.href = leadFormConfig.redirect + (redirectParams ? '?'+redirectParams : '')

          return;
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

        trigger(leadForm, 'form-submit-success')
      } else {
        if(typeof data === 'object' && data['errors']){
          let scrolledToInput = false
          Object.keys(data['errors']).forEach(name => {
            let formInput = leadForm.querySelector(`[name="${name}"]`)
            if(formInput && formInput['setError']) {
              formInput.setError(data['errors'][name])
              if(!scrolledToInput){
                if(document.scrollTo) {
                  document.scrollTo(formInput, 700)
                }
                scrolledToInput = true;
              }
            }
          })
        }

        trigger(leadForm, 'form-submit-error')
      }

      formBtn.classList.remove('is-loading')
      formBtn.removeAttribute('disabled');
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
      trigger(leadForm, 'form-interaction')
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
          if(value.indexOf('+1') > -1){
            input.value = value.replace('+1', '')
          }
          trigger(input, 'input')
        }
      }
      if(glossaryInput){
        glossaryInput.value = value
        if(glossaryInput.dataset.validation === "tel-mask"){
          if(value.indexOf('+1') > -1){
            glossaryInput.value = value.replace('+1', '')
          }
          trigger(glossaryInput, 'input')
        }
      }
    })
  }

  phoneInputs.forEach(function (phoneInput) {
    telInputMask(phoneInput, {
      mask: '(xxx) xxx - xxxx',
      hiddenInput: true
    })
  })
  validate(leadForm, {
    submitFunction: sendAjax,
    trackErrors: true
  })
  initAddress()
  inputSelect()
  getValuesFromQueue()
}

function initFormEngine(form){
  loadScript(`https://maps.googleapis.com/maps/api/js?key=${formConfig.googleMapsApiKey}&libraries=places`, function () {
    formEngineCallback(form)
  });
}

window.initFormEngine = initFormEngine

document.addEventListener("DOMContentLoaded", function () {
  sessionStorageUTM()
});