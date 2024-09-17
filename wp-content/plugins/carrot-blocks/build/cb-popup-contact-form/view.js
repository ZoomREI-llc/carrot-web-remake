/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./src/cb-popup-contact-form/view.js ***!
  \*******************************************/
document.addEventListener("DOMContentLoaded", function () {
  const popupWrapper = document.querySelector(".cb-popup-contact-form__wrapper");
  const popupBtnClose = document.querySelector(".cb-popup-contact-form__btn-close");
  let timerId = setTimeout(() => popupWrapper.classList.add("_visible-popup"), 1000);
  popupBtnClose.addEventListener("click", e => {
    clearTimeout(timerId);
    popupWrapper.classList.remove("_visible-popup");
  });
});
/******/ })()
;
//# sourceMappingURL=view.js.map