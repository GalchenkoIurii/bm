/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
document.addEventListener("DOMContentLoaded", function () {
  var photoInput = document.querySelector('#profile-photo');

  if (photoInput) {
    photoInput.addEventListener('change', function (e) {
      if (this.value != '' && e.target.files.length > 0) {
        this.parentNode.previousElementSibling.textContent = 'Выбрано фото ' + e.target.files[0].name;
        var photoUrl = URL.createObjectURL(e.target.files[0]);
        var preview = document.querySelector('#profile-photo-preview');
        preview.src = photoUrl;
      } else {
        this.parentNode.previousElementSibling.textContent = 'Выберите фото...';
      }
    });
  }
}, false);
/******/ })()
;