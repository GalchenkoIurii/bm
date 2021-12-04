/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

// custom select
// const CLASS_NAME_SELECT = 'select';
// const CLASS_NAME_ACTIVE = 'select_show';
// const CLASS_NAME_SELECTED = 'select__option_selected';
// const SELECTOR_ACTIVE = '.select_show';
// const SELECTOR_DATA = '[data-select]';
// const SELECTOR_DATA_TOGGLE = '[data-select="toggle"]';
// const SELECTOR_OPTION_SELECTED = '.select__option_selected';
//
// class CustomSelect {
//     constructor(target, params) {
//         this._elRoot = typeof target === 'string' ? document.querySelector(target) : target;
//         this._params = params || {};
//         if (this._params['options']) {
//             this._elRoot.classList.add(CLASS_NAME_SELECT);
//             this._elRoot.innerHTML = CustomSelect.template(this._params);
//         }
//         if (this._elRoot) {
//             this._elToggle = this._elRoot.querySelector(SELECTOR_DATA_TOGGLE);
//             this._elRoot.addEventListener('click', this._onClick.bind(this));
//         }
//     }
//     _onClick(e) {
//         const target = e.target;
//         const type = target.closest(SELECTOR_DATA).dataset.select;
//         switch (type) {
//             case 'toggle':
//                 this.toggle();
//                 break;
//             case 'option':
//                 this._changeValue(target);
//                 break;
//         }
//     }
//     _update(option) {
//         const selected = this._elRoot.querySelector(SELECTOR_OPTION_SELECTED);
//         if (selected) {
//             selected.classList.remove(CLASS_NAME_SELECTED);
//         }
//         option.classList.add(CLASS_NAME_SELECTED);
//
//         this._elToggle.textContent = option.textContent;
//         this._elToggle.value = option.dataset['value'];
//         this._elToggle.dataset.index = option.dataset['index'];
//         this._elRoot.dispatchEvent(new CustomEvent('select.change'));
//         this._params.onSelected ? this._params.onSelected(this, option) : null;
//         return option.dataset['value'];
//     }
//     _reset() {
//         const selected = this._elRoot.querySelector(SELECTOR_OPTION_SELECTED);
//         if (selected) {
//             selected.classList.remove(CLASS_NAME_SELECTED);
//         }
//         this._elToggle.textContent = 'Выберите из списка';
//         this._elToggle.value = '';
//         this._elToggle.dataset.index = -1;
//         this._elRoot.dispatchEvent(new CustomEvent('select.change'));
//         this._params.onSelected ? this._params.onSelected(this, null) : null;
//         return '';
//     }
//     _changeValue(option) {
//         if (option.classList.contains(CLASS_NAME_SELECTED)) {
//             return;
//         }
//         this._update(option);
//         this.hide();
//     }
//     show() {
//         document.querySelectorAll(SELECTOR_ACTIVE).forEach(select => {
//             select.classList.remove(CLASS_NAME_ACTIVE);
//         });
//         this._elRoot.classList.add(CLASS_NAME_ACTIVE);
//     }
//     hide() {
//         this._elRoot.classList.remove(CLASS_NAME_ACTIVE);
//     }
//     toggle() {
//         if (this._elRoot.classList.contains(CLASS_NAME_ACTIVE)) {
//             this.hide();
//         } else {
//             this.show();
//         }
//     }
//     dispose() {
//         this._elRoot.removeEventListener('click', this._onClick);
//     }
//     get value() {
//         return this._elToggle.value;
//     }
//     set value(value) {
//         let isExists = false;
//         this._elRoot.querySelectorAll('.select__option').forEach((option) => {
//             if (option.dataset['value'] === value) {
//                 isExists = true;
//                 return this._update(option);
//             }
//         });
//         if (!isExists) {
//             return this._reset();
//         }
//     }
//     get selectedIndex() {
//         return this._elToggle.dataset['index'];
//     }
//     set selectedIndex(index) {
//         const option = this._elRoot.querySelector(`.select__option[data-index="${index}"]`);
//         if (option) {
//             return this._update(option);
//         }
//         return this._reset();
//     }
// }
//
// CustomSelect.template = params => {
//     const name = params['name'];
//     const options = params['options'];
//     const targetValue = params['targetValue'];
//     let items = [];
//     let selectedIndex = -1;
//     let selectedValue = '';
//     let selectedContent = 'Выберите из списка';
//     options.forEach((option, index) => {
//         let selectedClass = '';
//         if (option[0] === targetValue) {
//             selectedClass = ' select__option_selected';
//             selectedIndex = index;
//             selectedValue = option[0];
//             selectedContent = option[1];
//         }
//         items.push(`<li class="select__option${selectedClass}" data-select="option" data-value="${option[0]}" data-index="${index}">${option[1]}</li>`);
//     });
//     return `<button type="button" class="select__toggle" name="${name}" value="${selectedValue}" data-select="toggle" data-index="${selectedIndex}">${selectedContent}</button>
//   <div class="select__dropdown">
//     <ul class="select__options">${items.join('')}</ul>
//   </div>`;
// };
// document.addEventListener('click', (e) => {
//     if (!e.target.closest('.select')) {
//         document.querySelectorAll(SELECTOR_ACTIVE).forEach(select => {
//             select.classList.remove(CLASS_NAME_ACTIVE);
//         });
//     }
// });
// get geo position
function getGeoPosition() {
  var latitude = null;
  var longitude = null; // function geo_success(position) {
  //     latitude  = position.coords.latitude;
  //     longitude = position.coords.longitude;
  // }
  //
  // function geo_error(error) {
  //     alert("Ошибка получения геоданных. " + error.message);
  // }
  // const geo_options = {
  //     enableHighAccuracy: true,
  //     maximumAge        : 20000
  // };
  // const promise = new Promise(function(resolve, reject) {
  //     if (!navigator.geolocation) {
  //         alert('Определение геоданных не поддерживается вашим браузером');
  //         return false;
  //     } else {
  //         navigator.geolocation.getCurrentPosition(function(pos){
  //             let lat = pos.coords.latitude;
  //             let long = pos.coords.longitude;
  //             resolve({lat,long});
  //         })
  //     }
  //
  // });
  //
  // promise.then(function(geo) {
  //     // console.log(geo.lat, geo.long);
  //     return {
  //         latitude: geo.lat,
  //         longitude: geo.long
  //     };
  // });
} // select


function closeAllSelect(element) {
  var elemsNum = [];
  var selectElems = document.querySelectorAll('.select_items');
  var selectedElems = document.querySelectorAll('.select_selected');

  for (var i = 0; i < selectedElems.length; i++) {
    if (element == selectedElems[i]) {
      elemsNum.push(i);
    } else {
      selectedElems[i].classList.remove('select-arrow-active');
    }
  }

  for (var _i = 0; _i < selectElems.length; _i++) {
    if (elemsNum.indexOf(_i)) {
      selectElems[_i].classList.add('select_hide');
    }
  }
}

function initSelects() {
  var selectElems = document.querySelectorAll('.select');

  for (var i = 0; i < selectElems.length; i++) {
    var selectElem = selectElems[i].querySelectorAll('select')[0]; // console.log(selectElem);

    var divElement = document.createElement('DIV');
    divElement.setAttribute('class', 'select_selected');

    if (selectElem) {
      // console.log(selectElem);
      // console.log(selectElem.selectedIndex);
      // console.log(selectElem.options);
      if (selectElem.selectedIndex !== -1) {
        divElement.innerHTML = selectElem.options[selectElem.selectedIndex].innerHTML;
      }

      selectElems[i].appendChild(divElement);
      var optionList = document.createElement('DIV');
      optionList.setAttribute('class', 'select_items select_hide');

      for (var j = 0; j < selectElem.length; j++) {
        var optionDivElement = document.createElement('DIV');
        optionDivElement.innerHTML = selectElem.options[j].innerHTML;
        optionDivElement.setAttribute('data-value', selectElem.options[j].value);
        optionDivElement.addEventListener('click', function (e) {
          var currentSelect = this.parentNode.parentNode.querySelectorAll('select')[0];
          var selectedDiv = this.parentNode.previousSibling; //console.log(currentSelect);
          //console.log(selectedDiv);

          for (var _i2 = 0; _i2 < currentSelect.length; _i2++) {
            if (currentSelect.options[_i2].innerHTML == this.innerHTML) {
              // console.log(currentSelect.options[i]);
              currentSelect.selectedIndex = _i2;
              selectedDiv.innerHTML = this.innerHTML;
              var selectedElems = this.parentNode.querySelectorAll('.selected-item');

              for (var k = 0; k < selectedElems.length; k++) {
                selectedElems[k].removeAttribute('class');
              }

              this.setAttribute('class', 'selected-item');
              var selectedValue = this.getAttribute('data-value');

              if (selectedValue == currentSelect.options[_i2].value) {
                currentSelect.options[_i2].selected = true;
              } // console.log(selectedValue);
              // console.log(currentSelect.options[i].value);
              // console.log(currentSelect.options[i].selected);


              break;
            }
          }

          selectedDiv.click();
        });
        optionList.appendChild(optionDivElement);
      }

      selectElems[i].appendChild(optionList);
    }

    divElement.addEventListener('click', function (e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle('select_hide');
      this.classList.toggle('select-arrow-active');
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener('click', closeAllSelect);
  initSelects(); // mobile menu

  var mobileMenu = document.querySelector("#mobileMenu");
  var mobileMenuOpen = document.querySelector("#mobileMenuOpen");
  var mobileMenuClose = document.querySelector("#mobileMenuClose");

  if (mobileMenuOpen) {
    mobileMenuOpen.addEventListener("click", function (e) {
      e.preventDefault();

      if (mobileMenu) {
        mobileMenu.setAttribute("data-open", true);
        mobileMenuOpen.style.display = "none";
      }
    });
  }

  if (mobileMenuClose) {
    mobileMenuClose.addEventListener("click", function (e) {
      e.preventDefault();

      if (mobileMenu && mobileMenu.hasAttribute("data-open")) {
        mobileMenu.removeAttribute("data-open");
        mobileMenuOpen.style.display = "";
      }
    });
  } // modal window


  var modalWindow = document.querySelector("#modal");
  var modalWindowClose = document.querySelector("#modalClose");

  if (modalWindowClose) {
    modalWindowClose.addEventListener("click", function (e) {
      e.preventDefault();

      if (modalWindow) {
        modalWindow.style.display = "none";
      }
    });
  } // handle application data
  // category select
  // const categorySelect = new CustomSelect('#category-select');
  // let serviceSelect = new CustomSelect('#service-select');
  // const placeSelect = new CustomSelect('#place-select');
  // const countrySelect = new CustomSelect('#country-select');


  var dataBlocks = document.querySelectorAll('[data-block]');
  var btnPrev = document.getElementById('btn-prev');
  var btnNext = document.getElementById('btn-next');
  var stepsAmountEl = document.getElementById('amount-step');
  var currentStepEl = document.getElementById('current-step');
  var step = 1;

  if (dataBlocks) {
    if (stepsAmountEl) {
      stepsAmountEl.textContent = String(dataBlocks.length);
    }

    for (var i = 1; i < dataBlocks.length; i++) {
      dataBlocks[i].style.display = 'none';
    }

    if (currentStepEl) {
      currentStepEl.textContent = String(step);
    }
  }

  if (btnPrev) {
    btnPrev.style.display = 'none';
    btnPrev.addEventListener("click", function (e) {
      switch (step) {
        case 2:
          e.preventDefault();
          var secondElSelector = '[data-block="' + step + '"]';
          document.querySelector(secondElSelector).style.display = 'none'; // let serviceSelectEl = document.querySelector('#service-select');
          // for (let node of document.querySelector('#service-select').childNodes) {
          //     node.remove();
          // }

          step--;
          currentStepEl.textContent = String(step);
          var firstElSelector = '[data-block="' + step + '"]';
          document.querySelector(firstElSelector).style.display = 'inline-flex';
          btnPrev.style.display = 'none';
          break;

        case 3:
          e.preventDefault();
          var thirdElSelector = '[data-block="' + step + '"]';
          document.querySelector(thirdElSelector).style.display = 'none';
          step--;
          currentStepEl.textContent = String(step);
          var secondElemSelector = '[data-block="' + step + '"]';
          document.querySelector(secondElemSelector).style.display = 'inline-flex';
          break;

        case 4:
          e.preventDefault();
          var fourthElSelector = '[data-block="' + step + '"]';
          document.querySelector(fourthElSelector).style.display = 'none';
          step--;
          currentStepEl.textContent = String(step);
          var thirdElemSelector = '[data-block="' + step + '"]';
          document.querySelector(thirdElemSelector).style.display = 'inline-flex';
          break;

        case 5:
          e.preventDefault();
          var fifthElSelector = '[data-block="' + step + '"]';
          document.querySelector(fifthElSelector).style.display = 'none';
          step--;
          currentStepEl.textContent = String(step);
          var fourthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(fourthElemSelector).style.display = 'inline-flex';
          break;

        case 6:
          e.preventDefault();
          var sixthElSelector = '[data-block="' + step + '"]';
          document.querySelector(sixthElSelector).style.display = 'none';
          step--;
          currentStepEl.textContent = String(step);
          var fifthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(fifthElemSelector).style.display = 'inline-flex';
          break;

        case 7:
          e.preventDefault();
          var seventhElSelector = '[data-block="' + step + '"]';
          document.querySelector(seventhElSelector).style.display = 'none';
          step--;
          currentStepEl.textContent = String(step);
          var sixthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(sixthElemSelector).style.display = 'inline-flex';
          break;
      }
    });
  }

  if (btnNext) {
    btnNext.addEventListener("click", function (e) {
      switch (step) {
        case 1:
          e.preventDefault();
          var categoryId = document.getElementById('category_id').value;
          var csrf_token = document.querySelector('input[name="_token"]').value;
          fetch('/applications/services', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json;charset=utf-8',
              'X-CSRF-TOKEN': csrf_token
            },
            body: JSON.stringify({
              category_id: categoryId
            })
          }).then(function (response) {
            return response.json();
          }).then(function (data) {
            // const options = [];
            //
            // data.forEach(function(item) {
            //     options.push([item.id, item.name]);
            // });
            var items = [];
            data.forEach(function (item) {
              items.push("<option value=\"".concat(item.id, "\">").concat(item.name, "</option>"));
            });

            if (items.length) {
              // let name = 'service_id-btn';
              // let selectedContent = 'Выберите услугу';
              //
              // let template = `<button type="button" class="select__toggle" name="${name}"
              //                     value="" data-select="toggle"
              //                     data-index="-1">${selectedContent}</button>
              //                     <div class="select__dropdown">
              //                         <ul class="select__options">${items.join('')}</ul>
              //                     </div>`;
              document.querySelector('#service_id').insertAdjacentHTML('afterbegin', items.join(''));
              document.querySelector('#service-select .select_selected').remove();
              document.querySelector('#service-select .select_items.select_hide').remove();
              initSelects(); // if (serviceSelect) {
              //     serviceSelect = null;
              // }
              // let serviceSelect = new CustomSelect('#service-select', {
              //     name: 'service_id-btn',
              //     // selectedContent: 'Выберите услугу',
              //     // targetValue: 'Выберите услугу',
              //     options
              // });
              // serviceSelect.dispose();
              //
              // document.querySelector('[name="service_id-btn"]').textContent = 'Выберите услугу';
              //
              // serviceSelect.show();
            }

            var firstElSelector = '[data-block="' + step + '"]';
            document.querySelector(firstElSelector).style.display = 'none'; // document.querySelector('#category_id').value = categoryId;

            step++;
            currentStepEl.textContent = String(step);
            var secondElSelector = '[data-block="' + step + '"]';
            document.querySelector(secondElSelector).style.display = 'inline-flex';
            btnPrev.style.display = 'inline-flex'; // document.querySelector('.select__trigger').textContent = document.querySelector('.select__item_selected').textContent;
          });
          break;

        case 2:
          e.preventDefault();
          var secondElSelector = '[data-block="' + step + '"]';
          document.querySelector(secondElSelector).style.display = 'none'; // document.querySelector('#service_id').value = document.querySelector('[name="service_id-btn"]').value;

          step++;
          currentStepEl.textContent = String(step);
          var thirdElSelector = '[data-block="' + step + '"]';
          document.querySelector(thirdElSelector).style.display = 'inline-flex';
          break;

        case 3:
          e.preventDefault();
          var thirdElemSelector = '[data-block="' + step + '"]';
          document.querySelector(thirdElemSelector).style.display = 'none';
          step++;
          currentStepEl.textContent = String(step);
          var fourthElSelector = '[data-block="' + step + '"]';
          document.querySelector(fourthElSelector).style.display = 'inline-flex';
          var photoInput = document.querySelector('#photo');

          if (photoInput) {
            photoInput.addEventListener('change', function (e) {
              if (this.value != '' && e.target.files.length > 0) {
                this.parentNode.previousElementSibling.textContent = 'Выбрано фото ' + e.target.files[0].name;
                var photoUrl = URL.createObjectURL(e.target.files[0]);
                var preview = document.querySelector('#photo-preview');
                preview.src = photoUrl;
                preview.style.display = 'inline-flex';
              } else {
                this.parentNode.previousElementSibling.textContent = 'Выберите фото...';
              }
            });
          }

          break;

        case 4:
          e.preventDefault();
          var fourthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(fourthElemSelector).style.display = 'none';
          step++;
          currentStepEl.textContent = String(step);
          var fifthElSelector = '[data-block="' + step + '"]';
          document.querySelector(fifthElSelector).style.display = 'inline-flex';
          break;

        case 5:
          e.preventDefault();
          var fifthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(fifthElemSelector).style.display = 'none';
          step++;
          currentStepEl.textContent = String(step);
          var sixthElSelector = '[data-block="' + step + '"]';
          document.querySelector(sixthElSelector).style.display = 'inline-flex'; // need to fix place select !!!!!!!!!
          // const placeSelectBtn = document.getElementById('place-select');
          // placeSelectBtn.addEventListener('select.change', function(e) {
          //     const btn = e.target.querySelector('#place-btn');
          //     console.log(btn.value);
          //
          //     document.querySelector('#place').value = btn.value;
          //
          //     const addressBtns = document.getElementById('address-btns');
          //
          //     if (btn.value == 'client' || btn.value == 'both') {
          //         addressBtns.style.display = 'inline-flex';
          //
          //         const addressBtn = document.getElementById('btn-address');
          //         const geoBtn = document.getElementById('btn-coords');
          //
          //         if (addressBtn) {
          //             addressBtn.addEventListener('click', function(e) {
          //                 e.preventDefault();
          //
          //                 document.querySelector('[data-block="6"]').style.display = 'none';
          //
          //                 document.getElementById('address-data').style.display = 'inline-flex';
          //             });
          //         }
          //
          //         if (geoBtn) {
          //             geoBtn.addEventListener('click', function(e) {
          //                 e.preventDefault();
          //
          //                 const promise = new Promise(function(resolve, reject) {
          //                     if (!navigator.geolocation) {
          //                         alert('Определение геоданных не поддерживается вашим браузером');
          //                         return false;
          //                     } else {
          //                         navigator.geolocation.getCurrentPosition(function(pos){
          //                             let lat = pos.coords.latitude;
          //                             let long = pos.coords.longitude;
          //                             resolve({lat,long});
          //                         })
          //                     }
          //                 });
          //
          //                 promise.then(function(geo) {
          //                     console.log(geo.lat, geo.long);
          //                     document.getElementById('coord_lat').value = geo.lat;
          //                     document.getElementById('coord_long').value = geo.long;
          //
          //                     addressBtns.style.display = 'none';
          //                     document.getElementById('coords-saved').style.display = 'inline-flex';
          //                 });
          //
          //             });
          //         }
          //
          //     } else {
          //         addressBtns.style.display = 'none';
          //     }
          //
          // });

          break;

        case 6:
          e.preventDefault();
          var sixthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(sixthElemSelector).style.display = 'none';
          document.getElementById('address-data').style.display = 'none'; // document.querySelector('#country').value = document.querySelector('#country-btn').value;

          step++;
          currentStepEl.textContent = String(step);
          var seventhElSelector = '[data-block="' + step + '"]';
          document.querySelector(seventhElSelector).style.display = 'inline-flex';
          break;
      }
    });
  }
}, false);

/***/ }),

/***/ "./resources/sass/main.scss":
/*!**********************************!*\
  !*** ./resources/sass/main.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/media.scss":
/*!***********************************!*\
  !*** ./resources/sass/media.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/main": 0,
/******/ 			"css/media": 0,
/******/ 			"css/main": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/media","css/main"], () => (__webpack_require__("./resources/js/main.js")))
/******/ 	__webpack_require__.O(undefined, ["css/media","css/main"], () => (__webpack_require__("./resources/sass/main.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/media","css/main"], () => (__webpack_require__("./resources/sass/media.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;