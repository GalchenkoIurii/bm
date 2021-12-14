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
                        @if($profile->user->is_master)
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Email: </span>
                                <span class="card__item-content">{{ $profile->user->email }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер телефона: </span>
                                <span class="card__item-content">{{ $profile->user->phone }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Страна: </span>
                                <span class="card__item-content">{{ $profile->country }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Область/Регион: </span>
                                <span class="card__item-content">{{ $profile->region }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Район: </span>
                                <span class="card__item-content">{{ $profile->district }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Город: </span>
                                <span class="card__item-content">{{ $profile->city }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Улица: </span>
                                <span class="card__item-content">{{ $profile->street }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер дома: </span>
                                <span class="card__item-content">{{ $profile->house }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер помещения/квартиры: </span>
                                <span class="card__item-content">{{ $profile->locale_num }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Место: </span>
                                <span class="card__item-content">{{ $profile->place }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Обо мне: </span>
                                <span class="card__item-content">{{ $profile->about }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Образование: </span>
                                <span class="card__item-content">{{ $profile->education }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Опыт: </span>
                                <span class="card__item-content">{{ $profile->experience }}</span>
                            </p>
                        @else
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Email: </span>
                                <span class="card__item-content">{{ $profile->user->email }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер телефона: </span>
                                <span class="card__item-content">{{ $profile->user->phone }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Страна: </span>
                                <span class="card__item-content">{{ $profile->user->country }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Область/Регион: </span>
                                <span class="card__item-content">{{ $profile->user->region }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Район: </span>
                                <span class="card__item-content">{{ $profile->user->district }}</span>
                            </p>
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Город: </span>
                                <span class="card__item-content">{{ $profile->user->city }}</span>
                            </p>
                        @endif

                        @if($profile->user_id == auth()->id())
                                <div class="card__item card__item_column">
                                    <div class="btn-container">
                                        <a href="{{ route('profiles.edit', ['profile' => $profile->id]) }}"
                                           class="button button_colored button_shadowed">Редактировать профиль</a>
                                    </div>
                                </div>
                        @endif
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