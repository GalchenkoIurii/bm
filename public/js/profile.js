/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
// select
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

function initSelect(selector) {
  var select = document.querySelector(selector);
  var selectElem = select.querySelectorAll('select')[0];
  var divElement = document.createElement('DIV');
  divElement.setAttribute('class', 'select_selected');

  if (selectElem) {
    if (selectElem.selectedIndex !== -1) {
      divElement.innerHTML = selectElem.options[selectElem.selectedIndex].innerHTML;
    }

    select.appendChild(divElement);
    var optionList = document.createElement('DIV');
    optionList.setAttribute('class', 'select_items select_hide');

    for (var j = 0; j < selectElem.length; j++) {
      var optionDivElement = document.createElement('DIV');
      optionDivElement.innerHTML = selectElem.options[j].innerHTML;
      optionDivElement.setAttribute('data-value', selectElem.options[j].value);
      optionDivElement.addEventListener('click', function (e) {
        var currentSelect = this.parentNode.parentNode.querySelectorAll('select')[0];
        var selectedDiv = this.parentNode.previousSibling;

        for (var i = 0; i < currentSelect.length; i++) {
          if (currentSelect.options[i].innerHTML == this.innerHTML) {
            currentSelect.selectedIndex = i;
            selectedDiv.innerHTML = this.innerHTML;
            var selectedElems = this.parentNode.querySelectorAll('.selected-item');

            for (var k = 0; k < selectedElems.length; k++) {
              selectedElems[k].removeAttribute('class');
            }

            this.setAttribute('class', 'selected-item');
            var selectedValue = this.getAttribute('data-value');

            if (selectedValue == currentSelect.options[i].value) {
              currentSelect.options[i].selected = true;
            }

            break;
          }
        }

        selectedDiv.click();
      });
      optionList.appendChild(optionDivElement);
    }

    select.appendChild(optionList);
  }

  divElement.addEventListener('click', function (e) {
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle('select_hide');
    this.classList.toggle('select-arrow-active');
  });
}

document.addEventListener("DOMContentLoaded", function () {
  // avatar
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
  } // services select


  var categorySelect = document.querySelector('#category-select .select_items');
  var serviceSelectBox = document.querySelector('#service-select-box');
  categorySelect.addEventListener('click', function (e) {
    serviceSelectBox.style.display = 'none';
    var categoryId = e.target.getAttribute('data-value');
    var csrf_token = document.querySelector('input[name="_token"]').value;
    fetch('/profiles/services', {
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
      var items = [];
      data.forEach(function (item) {
        items.push("<input type=\"checkbox\" name=\"service_ids[]\" id=\"service-".concat(item.id, "\" value=\"").concat(item.id, "\">\n                                    <label for=\"service-").concat(item.id, "\" class=\"form-group-checkbox__label\">").concat(item.name, "</label>"));
      });

      if (items.length) {
        var serviceSelect = document.querySelector('#service-select-box .form-group-checkbox');
        serviceSelect.querySelectorAll('input').forEach(function (item) {
          item.remove();
        });
        serviceSelect.querySelectorAll('label').forEach(function (item) {
          item.remove();
        });
        serviceSelect.insertAdjacentHTML('afterbegin', items.join(''));
        serviceSelectBox.style.display = 'flex';
      } // data.forEach(function(item) {
      //     items.push(`<option value="${item.id}">${item.name}</option>`);
      // });
      //
      // if (items.length) {
      //     let serviceSelect = document.querySelector('#service_id');
      //     serviceSelect.querySelectorAll('option').forEach(function(item) {
      //         item.remove();
      //     });
      //
      //     serviceSelect.insertAdjacentHTML('afterbegin', items.join(''));
      //
      //     document.querySelector('#service-select .select_selected').remove();
      //     document.querySelector('#service-select .select_items.select_hide').remove();
      //
      //     initSelect('#service-select');
      //
      //     serviceSelectBox.style.display = 'flex';
      // }

    });
  });
}, false);
/******/ })()
;