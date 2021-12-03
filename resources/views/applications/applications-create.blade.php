@extends('layouts.main')

@section('page-title')Создание заявки@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Создание заявки</h1>
            <p class="page-description">Шаг <span class="application-step" id="current-step"></span> из
                <span class="application-step" id="amount-step"></span></p>
            <div class="form-container">
                <form action="{{ route('applications.store') }}" method="post" class="form"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" data-block="1">
                        <div class="select" id="category-select">
                            <button type="button" class="select__toggle" id="category_id-btn" name="category_id-btn" value=""
                                    data-select="toggle" data-index="-1">
                                Выберите категорию
                            </button>
                            <div class="select__dropdown">
                                <ul class="select__options">
                                    @php $index = 0; @endphp
                                    @foreach($categories as $category)
                                        <li class="select__option" data-select="option" data-value="{{ $category->id }}"
                                            data-index="{{ $index++ }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="category_id" id="category_id">
                    </div>
                    <div class="form-group" data-block="2">
                        <div class="select" id="service-select"></div>
                        <input type="hidden" name="service_id" id="service_id">
                    </div>
                    <div class="form-group" data-block="3">
                        <h3 class="page-description">Сколько Вы готовы заплатить за услугу? (не обязательно)</h3>
                        <label for="start_price" class="form-group__label">От ... грн</label>
                        <div class="form-group__input">
                            <input type="number" name="start_price" id="start_price">
                        </div>
                        <label for="end_price" class="form-group__label">До ... грн</label>
                        <div class="form-group__input">
                            <input type="number" name="end_price" id="end_price">
                        </div>
                    </div>
                    <div class="form-group file-input" data-block="4">
                        <h3 class="page-description">Добавьте фото, чтобы мастера смогли оценить объем работы (не обязательно)</h3>
                        <label for="photo" class="form-group__label file-input__label">Выберите фото...</label>
                        <div class="form-group__input">
                            <input type="file" class="file-input__input" name="photo" id="photo">
                        </div>
                        <div class="photo-preview">
                            <img id="photo-preview" src="" alt="">
                        </div>
                    </div>
                    <div class="form-group" data-block="5">
                        <h3 class="page-description">Выберите период, в который Вам нужна услуга (не обязательно)</h3>
                        <label for="start_date" class="form-group__label">С</label>
                        <div class="form-group__input">
                            <input type="date" name="start_date" id="start_date">
                        </div>
                        <label for="end_date" class="form-group__label">До</label>
                        <div class="form-group__input">
                            <input type="date" name="end_date" id="end_date">
                        </div>
                    </div>
                    <div class="form-group" data-block="6">
                        <h3 class="page-description">Выберите место встречи с мастером</h3>
                        <div class="select" id="place-select">
                            <button type="button" class="select__toggle" id="place-btn" name="place-btn" value=""
                                    data-select="toggle" data-index="-1">
                                Выберите место
                            </button>
                            <div class="select__dropdown">
                                <ul class="select__options">
                                    <li class="select__option" data-select="option" data-value="master"
                                        data-index="0">Я приеду к мастеру</li>
                                    <li class="select__option" data-select="option" data-value="client"
                                        data-index="1">Мастер приедет ко мне</li>
                                    <li class="select__option" data-select="option" data-value="both"
                                        data-index="2">Рассмотрю оба варианта</li>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="place" id="place">
                        <div id="address-btns" class="btn-container btn-address-container" style="display:none">
                            <button id="btn-address" type="submit" class="button button_colored button_shadowed">Оставить свой адрес</button>
                            <p class="page-description">...или</p>
                            <button id="btn-coords" type="submit" class="button button_colored button_shadowed">Оставить свое местоположение</button>
                        </div>
                        <h3 id="coords-saved" class="page-description" style="display:none">Ваше местоположение сохранено</h3>
                    </div>

                    <div id="address-data" class="form-group" style="display:none">
                        <h3 class="page-description">Введите свой адрес (не обязательно)</h3>
                        <h3 class="page-description">Ваши данные будут доступны только выбранному мастеру</h3>

                        <div class="select" id="country-select">
                            <button type="button" class="select__toggle" id="country-btn" name="country-btn" value=""
                                    data-select="toggle" data-index="-1">
                                Выберите страну
                            </button>
                            <div class="select__dropdown">
                                <ul class="select__options">
                                    <li class="select__option" data-select="option" data-value="Украина"
                                        data-index="0">Украина</li>
                                    <li class="select__option" data-select="option" data-value="Польша"
                                        data-index="1">Польша</li>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="country" id="country">
                        <label for="region" class="form-group__label">Область/Регион</label>
                        <div class="form-group__input">
                            <input type="text" name="region" id="region">
                        </div>
                        <label for="district" class="form-group__label">Район</label>
                        <div class="form-group__input">
                            <input type="text" name="district" id="district">
                        </div>
                        <label for="city" class="form-group__label">Город</label>
                        <div class="form-group__input">
                            <input type="text" name="city" id="city">
                        </div>
                        <label for="street" class="form-group__label">Улица</label>
                        <div class="form-group__input">
                            <input type="text" name="street" id="street">
                        </div>
                        <label for="house" class="form-group__label">Номер дома</label>
                        <div class="form-group__input">
                            <input type="text" name="house" id="house">
                        </div>
                        <label for="locale_num" class="form-group__label">Номер квартиры</label>
                        <div class="form-group__input">
                            <input type="text" name="locale_num" id="locale_num">
                        </div>
                    </div>

                    <div class="form-group" data-block="7">
                        <h3 class="page-description">Введите свои контактные данные</h3>
                        <label for="name" class="form-group__label">Имя</label>
                        <div class="form-group__input">
                            <input type="text" name="name" id="name">
                        </div>
                        <label for="phone" class="form-group__label">Номер телефона</label>
                        <div class="form-group__input">
                            <input type="text" name="phone" id="phone">
                        </div>
                        <label for="email" class="form-group__label">Email</label>
                        <div class="form-group__input">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>

                    <input type="hidden" name="coord_lat" id="coord_lat">
                    <input type="hidden" name="coord_long" id="coord_long">

                    <div class="form-group">
                        <div class="btn-container">
                            <button id="btn-prev" type="submit" class="button button_colored button_shadowed button_margined">Назад</button>
                            <button id="btn-next" type="submit" class="button button_colored button_shadowed">Далее</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection