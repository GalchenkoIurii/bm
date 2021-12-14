/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
document.addEventListener("DOMContentLoaded", function () {
  var photoInput = document.querySelector('#profile-photo');

  if (photoInput) {
    console.log(photoInput);
    photoInput.addEventListener('change', function (e) {
      if (this.value != '' && e.target.files.length > 0) {
        console.log(this.parentNode);
        this.parentNode.previousElementSibling.textContent = 'Выбрано фото ' + e.target.files[0].name;
        var photoUrl = URL.createObjectURL(e.target.files[0]);
        var preview = document.querySelector('#profile-photo-preview');
        preview.src = photoUrl; // preview.style.display = 'inline-flex';
      } else {
        console.log(this.parentNode);
        this.parentNode.previousElementSibling.textContent = 'Выберите фото...';
      }
    });
  }
}, false);
/******/ })()
;