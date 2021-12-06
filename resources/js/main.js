// get geo position

// function getGeoPosition() {
//     let latitude = null;
//     let longitude = null;
//
//     // function geo_success(position) {
//     //     latitude  = position.coords.latitude;
//     //     longitude = position.coords.longitude;
//     // }
//     //
//     // function geo_error(error) {
//     //     alert("Ошибка получения геоданных. " + error.message);
//     // }
//
//     // const geo_options = {
//     //     enableHighAccuracy: true,
//     //     maximumAge        : 20000
//     // };
//
//     // const promise = new Promise(function(resolve, reject) {
//     //     if (!navigator.geolocation) {
//     //         alert('Определение геоданных не поддерживается вашим браузером');
//     //         return false;
//     //     } else {
//     //         navigator.geolocation.getCurrentPosition(function(pos){
//     //             let lat = pos.coords.latitude;
//     //             let long = pos.coords.longitude;
//     //             resolve({lat,long});
//     //         })
//     //     }
//     //
//     // });
//     //
//     // promise.then(function(geo) {
//     //     // console.log(geo.lat, geo.long);
//     //     return {
//     //         latitude: geo.lat,
//     //         longitude: geo.long
//     //     };
//     // });
//
// }


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

function initSelects() {
    let selectElems = document.querySelectorAll('.select');

    for (let i = 0; i < selectElems.length; i++) {
        let selectElem = selectElems[i].querySelectorAll('select')[0];
        let divElement = document.createElement('DIV');
        divElement.setAttribute('class', 'select_selected');

        if (selectElem) {
            if (selectElem.selectedIndex !== -1) {
                divElement.innerHTML = selectElem.options[selectElem.selectedIndex].innerHTML;
            }

            selectElems[i].appendChild(divElement);

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

            selectElems[i].appendChild(optionList);
        }



        divElement.addEventListener('click', function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle('select_hide');
            this.classList.toggle('select-arrow-active');
        });
    }
}


document.addEventListener("DOMContentLoaded", function() {

    document.addEventListener('click', closeAllSelect);

    initSelects();

    // mobile menu
    const mobileMenu      = document.querySelector("#mobileMenu");
    const mobileMenuOpen  = document.querySelector("#mobileMenuOpen");
    const mobileMenuClose = document.querySelector("#mobileMenuClose");

    if (mobileMenuOpen) {
        mobileMenuOpen.addEventListener("click", function(e) {
            e.preventDefault();
            if (mobileMenu) {
                mobileMenu.setAttribute("data-open", true);
                mobileMenuOpen.style.display = "none";
            }
        });
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener("click", function(e) {
            e.preventDefault();
            if (mobileMenu && mobileMenu.hasAttribute("data-open")) {
                mobileMenu.removeAttribute("data-open");
                mobileMenuOpen.style.display = "";
            }
        });
    }


    // modal window
    const modalWindow = document.querySelector("#modal");
    const modalWindowClose = document.querySelector("#modalClose");

    if (modalWindowClose) {
        modalWindowClose.addEventListener("click", function(e) {
            e.preventDefault();
            if (modalWindow) {
                modalWindow.style.display = "none";
            }
        });
    }


    // handle application data

    const dataBlocks = document.querySelectorAll('[data-block]');
    const btnPrev = document.getElementById('btn-prev');
    const btnNext = document.getElementById('btn-next');
    const stepsAmountEl = document.getElementById('amount-step');
    let currentStepEl = document.getElementById('current-step');
    let step = 1;

    if (dataBlocks) {
        if (stepsAmountEl) {
            stepsAmountEl.textContent = String(dataBlocks.length);
        }

        for (let i = 1; i < dataBlocks.length; i++) {
            dataBlocks[i].style.display = 'none';
        }

        if (currentStepEl) {
            currentStepEl.textContent = String(step);
        }
    }


    if (btnPrev) {
        btnPrev.style.display = 'none';

        btnPrev.addEventListener("click", function(e) {
            switch(step) {
                case 2:
                    e.preventDefault();

                    const secondElSelector = '[data-block="' + step + '"]';
                    document.querySelector(secondElSelector).style.display = 'none';

                    step--;

                    currentStepEl.textContent = String(step);

                    document.querySelectorAll('.select_selected').forEach(function(item) {
                        item.remove();
                    });
                    document.querySelectorAll('.select_items.select_hide').forEach(function(item) {
                        item.remove();
                    });

                    initSelects();

                    const firstElSelector = '[data-block="' + step + '"]';
                    document.querySelector(firstElSelector).style.display = 'inline-flex';

                    btnPrev.style.display = 'none';

                    break;
                case 3:
                    e.preventDefault();

                    const thirdElSelector = '[data-block="' + step + '"]';
                    document.querySelector(thirdElSelector).style.display = 'none';

                    step--;

                    currentStepEl.textContent = String(step);

                    document.querySelector('#service-select .select_selected').remove();
                    document.querySelector('#service-select .select_items.select_hide').remove();

                    initSelects();

                    const secondElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(secondElemSelector).style.display = 'inline-flex';

                    break;
                case 4:
                    e.preventDefault();

                    const fourthElSelector = '[data-block="' + step + '"]';
                    document.querySelector(fourthElSelector).style.display = 'none';

                    step--;

                    currentStepEl.textContent = String(step);

                    const thirdElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(thirdElemSelector).style.display = 'inline-flex';

                    break;
                case 5:
                    e.preventDefault();

                    const fifthElSelector = '[data-block="' + step + '"]';
                    document.querySelector(fifthElSelector).style.display = 'none';

                    step--;

                    currentStepEl.textContent = String(step);

                    const fourthElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(fourthElemSelector).style.display = 'inline-flex';

                    break;
                case 6:
                    e.preventDefault();

                    const sixthElSelector = '[data-block="' + step + '"]';
                    document.querySelector(sixthElSelector).style.display = 'none';

                    step--;

                    if (document.getElementById('address-data').style.display !== 'none') {
                        document.getElementById('address-data').style.display = 'none';
                        step++;

                        document.querySelectorAll('#place-select .select_selected').forEach(function(item) {
                            item.remove();
                        });

                        document.querySelectorAll('#place-select .select_items.select_hide').forEach(function(item) {
                            item.remove();
                        });

                        initSelects();
                    }

                    currentStepEl.textContent = String(step);

                    const fifthElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(fifthElemSelector).style.display = 'inline-flex';

                    break;
                case 7:
                    e.preventDefault();

                    const seventhElSelector = '[data-block="' + step + '"]';
                    document.querySelector(seventhElSelector).style.display = 'none';
                    document.getElementById('address-data').style.display = 'none';

                    step--;

                    currentStepEl.textContent = String(step);

                    if (document.getElementById('address-data').style.display !== 'none') {
                        document.getElementById('address-data').style.display = 'none';
                    }

                    document.querySelectorAll('#place-select .select_selected').forEach(function(item) {
                        item.remove();
                    });

                    document.querySelectorAll('#place-select .select_items.select_hide').forEach(function(item) {
                        item.remove();
                    });

                    initSelects();

                    const sixthElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(sixthElemSelector).style.display = 'inline-flex';

                    break;
            }
        });
    }

    if (btnNext) {
        btnNext.addEventListener("click", function(e) {

            switch(step) {
                case 1:
                    e.preventDefault();
                    const categoryId = document.getElementById('category_id').value;
                    const csrf_token = document.querySelector('input[name="_token"]').value;

                    fetch('/applications/services', {
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
                                items.push(`<option value="${item.id}">${item.name}</option>`);
                            });

                            if (items.length) {
                                let serviceSelect = document.querySelector('#service_id');
                                serviceSelect.querySelectorAll('option').forEach(function(item) {
                                    item.remove();
                                });

                                serviceSelect.insertAdjacentHTML('afterbegin', items.join(''));

                                document.querySelector('#service-select .select_selected').remove();
                                document.querySelector('#service-select .select_items.select_hide').remove();

                                initSelects();

                            }


                            const firstElSelector = '[data-block="' + step + '"]';
                            document.querySelector(firstElSelector).style.display = 'none';

                            step++;

                            currentStepEl.textContent = String(step);

                            const secondElSelector = '[data-block="' + step + '"]';
                            document.querySelector(secondElSelector).style.display = 'inline-flex';
                            btnPrev.style.display = 'inline-flex';

                        });

                    break;
                case 2:
                    e.preventDefault();
                    const secondElSelector = '[data-block="' + step + '"]';
                    document.querySelector(secondElSelector).style.display = 'none';

                    step++;

                    currentStepEl.textContent = String(step);

                    const thirdElSelector = '[data-block="' + step + '"]';
                    document.querySelector(thirdElSelector).style.display = 'inline-flex';

                    break;
                case 3:
                    e.preventDefault();
                    const thirdElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(thirdElemSelector).style.display = 'none';

                    step++;

                    currentStepEl.textContent = String(step);

                    const fourthElSelector = '[data-block="' + step + '"]';
                    document.querySelector(fourthElSelector).style.display = 'inline-flex';

                    const photoInput = document.querySelector('#photo');
                    if (photoInput) {
                        photoInput.addEventListener('change', function(e) {
                            if (this.value != '' && e.target.files.length > 0) {
                                this.parentNode.previousElementSibling.textContent = 'Выбрано фото ' + e.target.files[0].name;
                                const photoUrl = URL.createObjectURL(e.target.files[0]);
                                const preview = document.querySelector('#photo-preview');
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
                    const fourthElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(fourthElemSelector).style.display = 'none';

                    step++;

                    currentStepEl.textContent = String(step);

                    const fifthElSelector = '[data-block="' + step + '"]';
                    document.querySelector(fifthElSelector).style.display = 'inline-flex';

                    break;
                case 5:
                    e.preventDefault();
                    const fifthElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(fifthElemSelector).style.display = 'none';

                    step++;

                    currentStepEl.textContent = String(step);

                    document.querySelectorAll('#place-select .select_selected').forEach(function(item) {
                        item.remove();
                    });

                    document.querySelectorAll('#place-select .select_items.select_hide').forEach(function(item) {
                        item.remove();
                    });

                    initSelects();

                    const sixthElSelector = '[data-block="' + step + '"]';
                    document.querySelector(sixthElSelector).style.display = 'inline-flex';


                    // address select handling
                    const addressBtns = document.getElementById('address-btns');
                    let placeSelectElems = document.querySelectorAll('#place-select .select_items div');
                    let placeValue = null;

                    for (let i = 0; i < placeSelectElems.length; i++) {
                        placeSelectElems[i].addEventListener('click', function(e) {
                            if (e.target.classList.contains('selected-item')) {
                                placeValue = e.target.getAttribute('data-value');

                                if ((placeValue === 'client' || placeValue === 'both') && addressBtns) {
                                    addressBtns.style.display = 'inline-flex';

                                    const addressBtn = document.getElementById('btn-address');
                                    const geoBtn = document.getElementById('btn-coords');

                                    if (addressBtn) {
                                        addressBtn.addEventListener('click', function(e) {
                                            e.preventDefault();

                                            document.querySelector('[data-block="6"]').style.display = 'none';

                                            document.querySelectorAll('#country-select .select_selected').forEach(function(item) {
                                                item.remove();
                                            });

                                            document.querySelectorAll('#country-select .select_items.select_hide').forEach(function(item) {
                                                item.remove();
                                            });

                                            initSelects();

                                            document.getElementById('address-data').style.display = 'inline-flex';
                                        });
                                    }

                                    if (geoBtn) {
                                        geoBtn.addEventListener('click', function(e) {
                                            e.preventDefault();

                                            const promise = new Promise(function(resolve, reject) {
                                                if (!navigator.geolocation) {
                                                    alert('Определение геоданных не поддерживается вашим браузером');
                                                    return false;
                                                } else {
                                                    navigator.geolocation.getCurrentPosition(function(pos){
                                                        let lat = pos.coords.latitude;
                                                        let long = pos.coords.longitude;
                                                        resolve({lat,long});
                                                    })
                                                }
                                            });

                                            promise.then(function(geo) {
                                                console.log(geo.lat, geo.long);
                                                document.getElementById('coord_lat').value = geo.lat;
                                                document.getElementById('coord_long').value = geo.long;

                                                addressBtns.style.display = 'none';
                                                document.getElementById('coords-saved').style.display = 'inline-flex';
                                            });
                                        });
                                    }
                                } else {
                                    addressBtns.style.display = 'none';
                                }
                            }
                        });
                    }

                    break;
                case 6:
                    e.preventDefault();
                    const sixthElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(sixthElemSelector).style.display = 'none';
                    document.getElementById('address-data').style.display = 'none';

                    step++;

                    currentStepEl.textContent = String(step);

                    const seventhElSelector = '[data-block="' + step + '"]';
                    document.querySelector(seventhElSelector).style.display = 'inline-flex';

                    break;
            }
        });
    }

}, false);