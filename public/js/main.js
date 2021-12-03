/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// custom select
var CLASS_NAME_SELECT = 'select';
var CLASS_NAME_ACTIVE = 'select_show';
var CLASS_NAME_SELECTED = 'select__option_selected';
var SELECTOR_ACTIVE = '.select_show';
var SELECTOR_DATA = '[data-select]';
var SELECTOR_DATA_TOGGLE = '[data-select="toggle"]';
var SELECTOR_OPTION_SELECTED = '.select__option_selected';

var CustomSelect = /*#__PURE__*/function () {
  function CustomSelect(target, params) {
    _classCallCheck(this, CustomSelect);

    this._elRoot = typeof target === 'string' ? document.querySelector(target) : target;
    this._params = params || {};

    if (this._params['options']) {
      this._elRoot.classList.add(CLASS_NAME_SELECT);

      this._elRoot.innerHTML = CustomSelect.template(this._params);
    }

    if (this._elRoot) {
      this._elToggle = this._elRoot.querySelector(SELECTOR_DATA_TOGGLE);

      this._elRoot.addEventListener('click', this._onClick.bind(this));
    }
  }

  _createClass(CustomSelect, [{
    key: "_onClick",
    value: function _onClick(e) {
      var target = e.target;
      var type = target.closest(SELECTOR_DATA).dataset.select;

      switch (type) {
        case 'toggle':
          this.toggle();
          break;

        case 'option':
          this._changeValue(target);

          break;
      }
    }
  }, {
    key: "_update",
    value: function _update(option) {
      var selected = this._elRoot.querySelector(SELECTOR_OPTION_SELECTED);

      if (selected) {
        selected.classList.remove(CLASS_NAME_SELECTED);
      }

      option.classList.add(CLASS_NAME_SELECTED);
      this._elToggle.textContent = option.textContent;
      this._elToggle.value = option.dataset['value'];
      this._elToggle.dataset.index = option.dataset['index'];

      this._elRoot.dispatchEvent(new CustomEvent('select.change'));

      this._params.onSelected ? this._params.onSelected(this, option) : null;
      return option.dataset['value'];
    }
  }, {
    key: "_reset",
    value: function _reset() {
      var selected = this._elRoot.querySelector(SELECTOR_OPTION_SELECTED);

      if (selected) {
        selected.classList.remove(CLASS_NAME_SELECTED);
      }

      this._elToggle.textContent = 'Выберите из списка';
      this._elToggle.value = '';
      this._elToggle.dataset.index = -1;

      this._elRoot.dispatchEvent(new CustomEvent('select.change'));

      this._params.onSelected ? this._params.onSelected(this, null) : null;
      return '';
    }
  }, {
    key: "_changeValue",
    value: function _changeValue(option) {
      if (option.classList.contains(CLASS_NAME_SELECTED)) {
        return;
      }

      this._update(option);

      this.hide();
    }
  }, {
    key: "show",
    value: function show() {
      document.querySelectorAll(SELECTOR_ACTIVE).forEach(function (select) {
        select.classList.remove(CLASS_NAME_ACTIVE);
      });

      this._elRoot.classList.add(CLASS_NAME_ACTIVE);
    }
  }, {
    key: "hide",
    value: function hide() {
      this._elRoot.classList.remove(CLASS_NAME_ACTIVE);
    }
  }, {
    key: "toggle",
    value: function toggle() {
      if (this._elRoot.classList.contains(CLASS_NAME_ACTIVE)) {
        this.hide();
      } else {
        this.show();
      }
    }
  }, {
    key: "dispose",
    value: function dispose() {
      this._elRoot.removeEventListener('click', this._onClick);
    }
  }, {
    key: "value",
    get: function get() {
      return this._elToggle.value;
    },
    set: function set(value) {
      var _this = this;

      var isExists = false;

      this._elRoot.querySelectorAll('.select__option').forEach(function (option) {
        if (option.dataset['value'] === value) {
          isExists = true;
          return _this._update(option);
        }
      });

      if (!isExists) {
        return this._reset();
      }
    }
  }, {
    key: "selectedIndex",
    get: function get() {
      return this._elToggle.dataset['index'];
    },
    set: function set(index) {
      var option = this._elRoot.querySelector(".select__option[data-index=\"".concat(index, "\"]"));

      if (option) {
        return this._update(option);
      }

      return this._reset();
    }
  }]);

  return CustomSelect;
}();

CustomSelect.template = function (params) {
  var name = params['name'];
  var options = params['options'];
  var targetValue = params['targetValue'];
  var items = [];
  var selectedIndex = -1;
  var selectedValue = '';
  var selectedContent = 'Выберите из списка';
  options.forEach(function (option, index) {
    var selectedClass = '';

    if (option[0] === targetValue) {
      selectedClass = ' select__option_selected';
      selectedIndex = index;
      selectedValue = option[0];
      selectedContent = option[1];
    }

    items.push("<li class=\"select__option".concat(selectedClass, "\" data-select=\"option\" data-value=\"").concat(option[0], "\" data-index=\"").concat(index, "\">").concat(option[1], "</li>"));
  });
  return "<button type=\"button\" class=\"select__toggle\" name=\"".concat(name, "\" value=\"").concat(selectedValue, "\" data-select=\"toggle\" data-index=\"").concat(selectedIndex, "\">").concat(selectedContent, "</button>\n  <div class=\"select__dropdown\">\n    <ul class=\"select__options\">").concat(items.join(''), "</ul>\n  </div>");
};

document.addEventListener('click', function (e) {
  if (!e.target.closest('.select')) {
    document.querySelectorAll(SELECTOR_ACTIVE).forEach(function (select) {
      select.classList.remove(CLASS_NAME_ACTIVE);
    });
  }
}); // get geo position

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
}

document.addEventListener("DOMContentLoaded", function () {
  // mobile menu
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


  var categorySelect = new CustomSelect('#category-select');
  var placeSelect = new CustomSelect('#place-select');
  var countrySelect = new CustomSelect('#country-select');
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
  }

  if (btnNext) {
    btnNext.addEventListener("click", function (e) {
      // e.preventDefault();
      switch (step) {
        case 1:
          e.preventDefault();
          var categoryId = document.getElementById('category_id-btn').value;
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
            var options = [];
            data.forEach(function (item) {
              options.push([item.id, item.name]);
            });
            var serviceSelect = new CustomSelect('#service-select', {
              name: 'service_id-btn',
              selectedContent: 'Выберите услугу',
              options: options
            });
            var firstElSelector = '[data-block="' + step + '"]';
            document.querySelector(firstElSelector).style.display = 'none';
            document.querySelector('#category_id').value = categoryId;
            step++;
            currentStepEl.textContent = String(step);
            var secondElSelector = '[data-block="' + step + '"]';
            document.querySelector(secondElSelector).style.display = 'inline-flex';
            document.querySelector('[name="service_id-btn"]').textContent = 'Выберите услугу';
            btnPrev.style.display = 'inline-flex';
          });
          break;

        case 2:
          e.preventDefault();
          var secondElSelector = '[data-block="' + step + '"]';
          document.querySelector(secondElSelector).style.display = 'none';
          document.querySelector('#service_id').value = document.querySelector('[name="service_id-btn"]').value;
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
          document.querySelector(sixthElSelector).style.display = 'inline-flex';
          var placeSelectBtn = document.getElementById('place-select');
          placeSelectBtn.addEventListener('select.change', function (e) {
            var btn = e.target.querySelector('#place-btn');
            console.log(btn.value);
            document.querySelector('#place').value = btn.value;
            var addressBtns = document.getElementById('address-btns');

            if (btn.value == 'client' || btn.value == 'both') {
              addressBtns.style.display = 'inline-flex';
              var addressBtn = document.getElementById('btn-address');
              var geoBtn = document.getElementById('btn-coords');

              if (addressBtn) {
                addressBtn.addEventListener('click', function (e) {
                  e.preventDefault();
                  document.querySelector('[data-block="6"]').style.display = 'none';
                  document.getElementById('address-data').style.display = 'inline-flex';
                });
              }

              if (geoBtn) {
                geoBtn.addEventListener('click', function (e) {
                  e.preventDefault();
                  var promise = new Promise(function (resolve, reject) {
                    if (!navigator.geolocation) {
                      alert('Определение геоданных не поддерживается вашим браузером');
                      return false;
                    } else {
                      navigator.geolocation.getCurrentPosition(function (pos) {
                        var lat = pos.coords.latitude;
                        var _long = pos.coords.longitude;
                        resolve({
                          lat: lat,
                          "long": _long
                        });
                      });
                    }
                  });
                  promise.then(function (geo) {
                    console.log(geo.lat, geo["long"]);
                    document.getElementById('coord_lat').value = geo.lat;
                    document.getElementById('coord_long').value = geo["long"];
                    addressBtns.style.display = 'none';
                    document.getElementById('coords-saved').style.display = 'inline-flex';
                  });
                });
              }
            } else {
              addressBtns.style.display = 'none';
            }
          });
          break;

        case 6:
          e.preventDefault();
          var sixthElemSelector = '[data-block="' + step + '"]';
          document.querySelector(sixthElemSelector).style.display = 'none';
          document.getElementById('address-data').style.display = 'none';
          document.querySelector('#country').value = document.querySelector('#country-btn').value;
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