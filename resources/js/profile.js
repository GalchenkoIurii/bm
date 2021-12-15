// select

function closeAllSelect(element) {
    let elemsNum = [];
    let selectElems = document.querySelectorAll('.select_items');
    let selectedElems = document.querySelectorAll('.select_selected');

    for (let i = 0; i < selectedElems.length; i++) {
        if (element == selectedElems[i]) {
            elemsNum.push(i);
        } else {
            selectedElems[i].classList.remove('select-arrow-active');
        }
    }

    for (let i = 0; i < selectElems.length; i++) {
        if (elemsNum.indexOf(i)) {
            selectElems[i].classList.add('select_hide');
        }
    }
}

function initSelect(selector) {
    let select = document.querySelector(selector);

        let selectElem = select.querySelectorAll('select')[0];
        let divElement = document.createElement('DIV');
        divElement.setAttribute('class', 'select_selected');

        if (selectElem) {
            if (selectElem.selectedIndex !== -1) {
                divElement.innerHTML = selectElem.options[selectElem.selectedIndex].innerHTML;
            }

            select.appendChild(divElement);

            let optionList = document.createElement('DIV');
            optionList.setAttribute('class', 'select_items select_hide');

            for (let j = 0; j < selectElem.length; j++) {
                let optionDivElement = document.createElement('DIV');
                optionDivElement.innerHTML = selectElem.options[j].innerHTML;

                optionDivElement.setAttribute('data-value', selectElem.options[j].value);

                optionDivElement.addEventListener('click', function(e) {
                    let currentSelect = this.parentNode.parentNode.querySelectorAll('select')[0];
                    let selectedDiv = this.parentNode.previousSibling;

                    for (let i = 0; i < currentSelect.length; i++) {
                        if (currentSelect.options[i].innerHTML == this.innerHTML) {
                            currentSelect.selectedIndex = i;
                            selectedDiv.innerHTML = this.innerHTML;

                            let selectedElems = this.parentNode.querySelectorAll('.selected-item');

                            for (let k = 0; k < selectedElems.length; k++) {
                                selectedElems[k].removeAttribute('class');
                            }

                            this.setAttribute('class', 'selected-item');

                            let selectedValue = this.getAttribute('data-value');

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



        divElement.addEventListener('click', function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle('select_hide');
            this.classList.toggle('select-arrow-active');
        });
}

document.addEventListener("DOMContentLoaded", function() {

    // avatar
    const photoInput = document.querySelector('#profile-photo');
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            if (this.value != '' && e.target.files.length > 0) {
                this.parentNode.previousElementSibling.textContent = 'Выбрано фото ' + e.target.files[0].name;
                const photoUrl = URL.createObjectURL(e.target.files[0]);
                const preview = document.querySelector('#profile-photo-preview');
                preview.src = photoUrl;
            } else {
                this.parentNode.previousElementSibling.textContent = 'Выберите фото...';
            }
        });
    }


    // services select

    const categorySelect = document.querySelector('#category-select .select_items');
    const serviceSelectBox = document.querySelector('#service-select-box');

    categorySelect.addEventListener('click', function(e) {
        serviceSelectBox.style.display = 'none';

        const categoryId = e.target.getAttribute('data-value');
        const csrf_token = document.querySelector('input[name="_token"]').value;

        fetch('/profiles/services', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
                'X-CSRF-TOKEN': csrf_token
            },
            body: JSON.stringify({
                category_id: categoryId
            })
        })
            .then(response => response.json())
            .then(data => {
                let items = [];

                data.forEach(function(item) {
                    items.push(`<input type="checkbox" name="service-${item.id}" id="service-${item.id}" value="${item.id}">
                                    <label for="service-${item.id}" class="form-group-checkbox__label">${item.name}</label>`);
                });

                if (items.length) {
                    let serviceSelect = document.querySelector('#service-select-box .form-group-checkbox');
                    serviceSelect.querySelectorAll('input').forEach(function(item) {
                        item.remove();
                    });
                    serviceSelect.querySelectorAll('label').forEach(function(item) {
                        item.remove();
                    });

                    serviceSelect.insertAdjacentHTML('afterbegin', items.join(''));

                    serviceSelectBox.style.display = 'flex';
                }

                // data.forEach(function(item) {
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