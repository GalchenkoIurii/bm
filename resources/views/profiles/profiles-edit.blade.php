@extends('layouts.main')

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Редактирование профиля@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">

            <h1 class="page-header">Редактирование профиля</h1>
            <div class="card-box">
                <div class="card">
                    <form action="{{ route('profiles.update', ['profile' => $profile->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card__item card__item_centered">
                            <div class="avatar-box">
                                <div class="avatar">
                                    <div class="avatar__square">
                                        <img id="profile-photo-preview" src="{{ $profile->getAvatar() }}" alt="" class="avatar__image">
                                    </div>
                                </div>
                            </div>
                            <div class="card__form-group card__file-input file-input">
                                <span class="card__item-title">Добавьте фото профиля</span>
                                <label for="profile-photo" class="form-group__label file-input__label">Выберите фото...</label>
                                <div class="form-group__input">
                                    <input type="file" class="file-input__input" name="photo" id="profile-photo">
                                </div>
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="first_name" class="card__form-group-label">Имя</label>
                            <div class="card__form-group-input">
                                <input type="text" name="first_name" id="first_name" value="{{ $profile->user->first_name }}">
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="last_name" class="card__form-group-label">Фамилия</label>
                            <div class="card__form-group-input">
                                <input type="text" name="last_name" id="last_name" value="{{ $profile->user->last_name }}">
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="email" class="card__form-group-label">Email</label>
                            <div class="card__form-group-input">
                                <input type="email" name="email" id="email" value="{{ $profile->user->email }}">
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="phone" class="card__form-group-label">Номер телефона</label>
                            <div class="card__form-group-input">
                                <input type="text" name="phone" id="phone" value="{{ $profile->user->phone }}">
                            </div>
                        </div>
                        @if($profile->user->is_master)
                            <div class="card__form-group">
                                <label for="category_id" class="card__form-group-label">Категория</label>
                                <div id="category-select" class="select">
                                    <select name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="service-select-box" class="card__form-group" style="display:none">
                                <label class="card__form-group-label">Услуги</label>
                                {{--<div id="service-select" class="select">--}}
                                    {{--<select name="service_id" id="service_id"></select>--}}
                                {{--</div>--}}
                                <div class="form-group-checkbox">

                                </div>
                            </div>

                            <div class="card__form-group">
                                <label for="country" class="card__form-group-label">Страна</label>
                                <div id="country-select" class="select">
                                    <select name="country" id="country">
                                        <option value="Украина" @if($profile->country == "Украина") selected @endif>Украина</option>
                                        <option value="Польша" @if($profile->country == "Польша") selected @endif>Польша</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="region" class="card__form-group-label">Область/Регион</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="region" id="region" value="{{ $profile->region }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="district" class="card__form-group-label">Район</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="district" id="district" value="{{ $profile->district }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="city" class="card__form-group-label">Город</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="city" id="city" value="{{ $profile->city }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="street" class="card__form-group-label">Улица</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="street" id="street" value="{{ $profile->street }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="house" class="card__form-group-label">Номер дома</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="house" id="house" value="{{ $profile->house }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="locale_num" class="card__form-group-label">Номер помещения/квартиры</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="locale_num" id="locale_num" value="{{ $profile->locale_num }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="country" class="card__form-group-label">Где могу принять клиента</label>
                                <div id="place-select" class="select">
                                    <select name="place" id="place">
                                        <option value="master" @if($profile->place == "master") selected @endif>У себя</option>
                                        <option value="client" @if($profile->place == "client") selected @endif>У клиента</option>
                                        <option value="both" @if($profile->place == "both") selected @endif>У себя или у клиента</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="about" class="card__form-group-label">Обо мне</label>
                                <div class="card__form-group-input">
                                    <textarea name="about" id="about">{{ $profile->about }}</textarea>
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="education" class="card__form-group-label">Образование</label>
                                <div class="card__form-group-input">
                                    <textarea name="education" id="education">{{ $profile->education }}</textarea>
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="experience" class="card__form-group-label">Опыт</label>
                                <div class="card__form-group-input">
                                    <textarea name="experience" id="experience">{{ $profile->experience }}</textarea>
                                </div>
                            </div>
                        @else
                            <div class="card__form-group">
                                <label for="country" class="card__form-group-label">Страна</label>
                                <div id="country-select" class="select">
                                    <select name="country" id="country">
                                        <option value="Украина" @if($profile->user->country == "Украина") selected @endif>Украина</option>
                                        <option value="Польша" @if($profile->user->country == "Польша") selected @endif>Польша</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="region" class="card__form-group-label">Область/Регион</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="region" id="region" value="{{ $profile->user->region }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="district" class="card__form-group-label">Район</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="district" id="district" value="{{ $profile->user->district }}">
                                </div>
                            </div>
                            <div class="card__form-group">
                                <label for="city" class="card__form-group-label">Город</label>
                                <div class="card__form-group-input">
                                    <input type="text" name="city" id="city" value="{{ $profile->user->city }}">
                                </div>
                            </div>
                        @endif

                        <div class="card__item card__item_column">
                            <div class="btn-container">
                                <button type="submit" class="button button_colored button_shadowed">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection