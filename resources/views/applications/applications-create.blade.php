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
                        <div id="category-select" class="select">
                            <select name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group" data-block="2">
                        <div id="service-select" class="select">
                            <select name="service_id" id="service_id"></select>
                        </div>
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
                        <div id="place-select" class="select">
                            <select name="place" id="place">
                                <option value="master">Я приеду к мастеру</option>
                                <option value="client">Мастер приедет ко мне</option>
                                <option value="both">Рассмотрю оба варианта</option>
                            </select>
                        </div>
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

                        <div id="country-select" class="select">
                            <select name="country" id="country">
                                <option value="Украина">Украина</option>
                                <option value="Польша">Польша</option>
                            </select>
                        </div>
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