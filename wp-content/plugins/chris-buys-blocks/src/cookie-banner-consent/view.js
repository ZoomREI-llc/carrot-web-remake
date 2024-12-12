import { fadeIn, fadeOut, accordion, dynamicListener } from "./modules/helpers";

window.dataLayer = window.dataLayer || [];

function gtag() {
  dataLayer.push(arguments);
}

function setupConsent() {
  let showConsentPopup = false;
  let banner = document.querySelector('.cookie-banner-consent')
  let bannerBtn = document.querySelector('.cookie-banner-consent-btn')
  let acceptAllBtn = banner.querySelector('.js-button-accept')
  let saveBtn = banner.querySelector('.js-button-save')
  let closeBtn = banner.querySelector('.cookie-banner-consent__close')

  let ad_storage = banner.querySelector('[name="ad_storage"]')
  let ad_user_data = banner.querySelector('[name="ad_user_data"]')
  let ad_personalization = banner.querySelector('[name="ad_personalization"]')
  let analytics_storage = banner.querySelector('[name="analytics_storage"]')

  let adStorageConsent = getCookie("adStorageConsent") || 'denied';
  let adUserDataConsent = getCookie("adUserDataConsent") || 'denied';
  let adPersonalizationConsent = getCookie("adPersonalizationConsent") || 'denied';
  let analyticsConsent = getCookie("analyticsConsent") || 'denied';

  window.currentConsent = {
    'ad_storage': adStorageConsent,
    'ad_user_data': adUserDataConsent,
    'ad_personalization': adPersonalizationConsent,
    'analytics_storage': analyticsConsent
  }

  gtag('consent', 'update', window.currentConsent);

  if (adStorageConsent === 'denied' || analyticsConsent === 'denied') {
    showConsentPopup = true;
  }


  setTimeout(function () {
    console.log(banner, showConsentPopup)
    if(showConsentPopup) {
      fadeIn(banner,300)
      console.log(banner)
    } else if(bannerBtn) {
      fadeIn(bannerBtn, 300, 'flex')
    }
  }, 2000)

  function saveConsent() {
    window.currentConsent = {
      'ad_storage': ad_storage.checked ? 'granted' : 'denied',
      'ad_user_data': ad_user_data.checked ? 'granted' : 'denied',
      'ad_personalization': ad_personalization.checked ? 'granted' : 'denied',
      'analytics_storage': analytics_storage.checked ? 'granted' : 'denied'
    }

    setCookie('adStorageConsent', window.currentConsent.ad_storage, 365);
    setCookie('adUserDataConsent', window.currentConsent.ad_user_data, 365);
    setCookie('adPersonalizationConsent', window.currentConsent.ad_personalization, 365);
    setCookie('analyticsConsent', window.currentConsent.analytics_storage, 365);

    gtag('consent', 'update', window.currentConsent);

    fadeOut(banner,300, function () {
      if(bannerBtn) {
        fadeIn(bannerBtn, 300, 'flex')
      }
    })

    document.location.reload()
  }

  accordion({
    containerSelector: '.cookie-banner-consent__accordion',
    btnSelector: '.cookie-banner-consent__accordion-btn',
    dropdownSelector: '.cookie-banner-consent__list',
    timing: 300,
  })
  dynamicListener('change', '.cookie-banner-consent [type="checkbox"]', function (e) {
    if(ad_storage.checked || ad_user_data.checked || ad_personalization.checked || analytics_storage.checked){
      saveBtn.textContent = saveBtn.dataset.selected
      saveBtn.classList.add('is-save')
    } else {
      saveBtn.textContent = saveBtn.dataset.notSelected
      saveBtn.classList.remove('is-save')
    }
  })
  acceptAllBtn.addEventListener('click',function (){
    ad_storage.checked = true
    ad_user_data.checked = true
    ad_personalization.checked = true
    analytics_storage.checked = true
    saveConsent()
  })
  saveBtn.addEventListener('click',function (){
    if(!saveBtn.classList.contains('is-save')){
      ad_storage.checked = false
      ad_user_data.checked = false
      ad_personalization.checked = false
      analytics_storage.checked = false
    }
    saveConsent()
  })
  closeBtn.addEventListener('click',function (){
    fadeOut(banner,300, function () {
      if(bannerBtn) {
        fadeIn(bannerBtn, 300, 'flex')
      }
    })
  })
  if(bannerBtn) {
    bannerBtn.addEventListener('click', function (e) {
      e.preventDefault()
      fadeOut(bannerBtn, 300, function () {
        fadeIn(banner,300)
      })
    })
  }
}

gtag('consent', 'default', {
  'ad_storage': 'denied',
  'ad_user_data': 'denied',
  'ad_personalization': 'denied',
  'analytics_storage': 'denied'
});

setupConsent()

window.gtag = gtag