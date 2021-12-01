// custom select
const CLASS_NAME_SELECT = 'select';
const CLASS_NAME_ACTIVE = 'select_show';
const CLASS_NAME_SELECTED = 'select__option_selected';
const SELECTOR_ACTIVE = '.select_show';
const SELECTOR_DATA = '[data-select]';
const SELECTOR_DATA_TOGGLE = '[data-select="toggle"]';
const SELECTOR_OPTION_SELECTED = '.select__option_selected';

class CustomSelect {
    constructor(target, params) {
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
    _onClick(e) {
        const target = e.target;
        const type = target.closest(SELECTOR_DATA).dataset.select;
        switch (type) {
            case 'toggle':
                this.toggle();
                break;
            case 'option':
                this._changeValue(target);
                break;
        }
    }
    _update(option) {
        const selected = this._elRoot.querySelector(SELECTOR_OPTION_SELECTED);
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
    _reset() {
        const selected = this._elRoot.querySelector(SELECTOR_OPTION_SELECTED);
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
    _changeValue(option) {
        if (option.classList.contains(CLASS_NAME_SELECTED)) {
            return;
        }
        this._update(option);
        this.hide();
    }
    show() {
        document.querySelectorAll(SELECTOR_ACTIVE).forEach(select => {
            select.classList.remove(CLASS_NAME_ACTIVE);
        });
        this._elRoot.classList.add(CLASS_NAME_ACTIVE);
    }
    hide() {
        this._elRoot.classList.remove(CLASS_NAME_ACTIVE);
    }
    toggle() {
        if (this._elRoot.classList.contains(CLASS_NAME_ACTIVE)) {
            this.hide();
        } else {
            this.show();
        }
    }
    dispose() {
        this._elRoot.removeEventListener('click', this._onClick);
    }
    get value() {
        return this._elToggle.value;
    }
    set value(value) {
        let isExists = false;
        this._elRoot.querySelectorAll('.select__option').forEach((option) => {
            if (option.dataset['value'] === value) {
                isExists = true;
                return this._update(option);
            }
        });
        if (!isExists) {
            return this._reset();
        }
    }
    get selectedIndex() {
        return this._elToggle.dataset['index'];
    }
    set selectedIndex(index) {
        const option = this._elRoot.querySelector(`.select__option[data-index="${index}"]`);
        if (option) {
            return this._update(option);
        }
        return this._reset();
    }
}

CustomSelect.template = params => {
    const name = params['name'];
    const options = params['options'];
    const targetValue = params['targetValue'];
    let items = [];
    let selectedIndex = -1;
    let selectedValue = '';
    let selectedContent = 'Выберите из списка';
    options.forEach((option, index) => {
        let selectedClass = '';
        if (option[0] === targetValue) {
            selectedClass = ' select__option_selected';
            selectedIndex = index;
            selectedValue = option[0];
            selectedContent = option[1];
        }
        items.push(`<li class="select__option${selectedClass}" data-select="option" data-value="${option[0]}" data-index="${index}">${option[1]}</li>`);
    });
    return `<button type="button" class="select__toggle" name="${name}" value="${selectedValue}" data-select="toggle" data-index="${selectedIndex}">${selectedContent}</button>
  <div class="select__dropdown">
    <ul class="select__options">${items.join('')}</ul>
  </div>`;
};


document.addEventListener('click', (e) => {
    if (!e.target.closest('.select')) {
        document.querySelectorAll(SELECTOR_ACTIVE).forEach(select => {
            select.classList.remove(CLASS_NAME_ACTIVE);
        });
    }
});


document.addEventListener("DOMContentLoaded", function() {
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
    // category select
    const categorySelect = new CustomSelect('#category-select');
    const dataBlocks = document.querySelectorAll('[data-block]');
    const btnPrev = document.getElementById('btn-prev');
    const btnNext = document.getElementById('btn-next');
    let step = 1;

    for (let i = 1; i < dataBlocks.length; i++) {
        dataBlocks[i].style.display = 'none';
    }

    if (btnPrev) {
        btnPrev.style.display = 'none';
    }

    if (btnNext) {
        btnNext.addEventListener("click", function(e) {
            e.preventDefault();

            switch(step) {
                case 1:
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
                            const options = [];

                            data.forEach(function(item) {
                                options.push([item.id, item.name]);
                            });

                            const serviceSelect = new CustomSelect('#service-select', {
                                name: 'service_id',
                                selectedContent: 'Выберите услугу',
                                options
                            });

                            const firstElSelector = '[data-block="' + step + '"]';
                            document.querySelector(firstElSelector).style.display = 'none';

                            step++;

                            const secondElSelector = '[data-block="' + step + '"]';
                            document.querySelector(secondElSelector).style.display = 'inline-flex';

                            document.querySelector('[name="service_id"]').textContent = 'Выберите услугу';

                            btnPrev.style.display = 'inline-flex';
                        });

                    break;
                case 2:
                    const secondElSelector = '[data-block="' + step + '"]';
                    document.querySelector(secondElSelector).style.display = 'none';

                    step++;

                    const thirdElSelector = '[data-block="' + step + '"]';
                    document.querySelector(thirdElSelector).style.display = 'inline-flex';

                    break;
                case 3:
                    const thirdElemSelector = '[data-block="' + step + '"]';
                    document.querySelector(thirdElemSelector).style.display = 'none';

                    step++;

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
            }
        });
    }

}, false);