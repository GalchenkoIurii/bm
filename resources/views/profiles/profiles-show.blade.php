@extends('layouts.main')

@section('page-title')Профиль пользователя@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h1>

            <div class="card-box">
                <div class="card">
                    @if($profile->user->is_master)
                        <p class="card__item">
                            <span class="card__item-title">Email: </span>
                            <span class="card__item-content">{{ $profile->user->email }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Номер телефона: </span>
                            <span class="card__item-content">{{ $profile->user->phone }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Аватар: </span>
                            <span class="card__item-content">{{ $profile->avatar }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Страна: </span>
                            <span class="card__item-content">{{ $profile->country }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Область/Регион: </span>
                            <span class="card__item-content">{{ $profile->region }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Район: </span>
                            <span class="card__item-content">{{ $profile->district }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Город: </span>
                            <span class="card__item-content">{{ $profile->city }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Улица: </span>
                            <span class="card__item-content">{{ $profile->street }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Номер дома: </span>
                            <span class="card__item-content">{{ $profile->house }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Номер помещения/квартиры: </span>
                            <span class="card__item-content">{{ $profile->locale_num }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Место: </span>
                            <span class="card__item-content">{{ $profile->place }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Обо мне: </span>
                            <span class="card__item-content">{{ $profile->about }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Образование: </span>
                            <span class="card__item-content">{{ $profile->education }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Опыт: </span>
                            <span class="card__item-content">{{ $profile->experience }}</span>
                        </p>
                    @else
                        <p class="card__item">
                            <span class="card__item-title">Email: </span>
                            <span class="card__item-content">{{ $profile->user->email }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Номер телефона: </span>
                            <span class="card__item-content">{{ $profile->user->phone }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Аватар: </span>
                            <span class="card__item-content">{{ $profile->avatar }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Страна: </span>
                            <span class="card__item-content">{{ $profile->user->country }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Область/Регион: </span>
                            <span class="card__item-content">{{ $profile->user->region }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Район: </span>
                            <span class="card__item-content">{{ $profile->user->district }}</span>
                        </p>
                        <p class="card__item">
                            <span class="card__item-title">Город: </span>
                            <span class="card__item-content">{{ $profile->user->city }}</span>
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection