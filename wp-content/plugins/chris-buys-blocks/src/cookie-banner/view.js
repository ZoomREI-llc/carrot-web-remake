import { getCookie, setCookie } from "./modules/helpers";

const cookieName = 'cookie_consent'
const cookieBannerTimeout = 2000

function cookieBannerCallback() {
  let cookieBanner = document.querySelector('.cookie-banner')
  let cookieBannerAccept = cookieBanner.querySelector('.cookie-banner__btn')
  let cookieBannerClose = cookieBanner.querySelector('.cookie-banner__close')

  setTimeout(function () {
    cookieBanner.classList.add('is-shown')
  }, cookieBannerTimeout)

  cookieBannerAccept.addEventListener('click', function (e) {
    e.preventDefault()
    cookieBanner.classList.remove('is-shown')

    setCookie(cookieName, true, 365)
  })
  cookieBannerClose.addEventListener('click', function (e) {
    e.preventDefault()
    cookieBanner.classList.remove('is-shown')
  })

  Fancybox.bind('.cookie-banner [data-fancybox]', {
    dragToClose: false
  })
}

document.addEventListener("DOMContentLoaded", function () {
  if(!getCookie(cookieName)){
    loadScript([
      'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js',
      'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css'
    ], cookieBannerCallback);
  }
})