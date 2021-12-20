@extends('layouts.main')

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Профиль пользователя@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            @if(session()->has('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="error-message">{{ $error }}</p>
                    @endforeach
                @endif
                @if(session()->has('success'))
                    <p class="status-message">{{ session('success') }}</p>
                @endif
            <div class="card-box">
                <div class="card">
                    <div class="card__item card__item_centered">
                        <div class="avatar-box">
                            <div class="avatar">
                                <div class="avatar__square">
                                    <img src="{{ asset('storage/' . $profile->avatar) }}" alt="" class="avatar__image">
                                </div>
                            </div>
                            @if($profile->user->isOnline())
                                <p class="avatar-box__status status-online">online</p>
                            @else
                                <p class="avatar-box__status status-not-online">не в сети</p>
                            @endif
                        </div>
                        <div class="name-box">
                            <h1 class="page-header">{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h1>
                            <div class="stars-box">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="responses">
                                    <p class="responses__text">отзывов - 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($profile->user->is_master)
                        <p class="card__item card__item_column">
                            <span class="card__item-title">Email: </span>
                            <span class="card__item-content">{{ $profile->user->email }}</span>
                        </p>
                        @if(!is_null($profile->user->phone))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер телефона: </span>
                                <span class="card__item-content">{{ $profile->user->phone }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->country))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Страна: </span>
                                <span class="card__item-content">{{ $profile->country }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->region))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Область/Регион: </span>
                                <span class="card__item-content">{{ $profile->region }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->district))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Район: </span>
                                <span class="card__item-content">{{ $profile->district }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->city))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Город: </span>
                                <span class="card__item-content">{{ $profile->city }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->street))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Улица: </span>
                                <span class="card__item-content">{{ $profile->street }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->house))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер дома: </span>
                                <span class="card__item-content">{{ $profile->house }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->locale_num))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер помещения/квартиры: </span>
                                <span class="card__item-content">{{ $profile->locale_num }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->place))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Где могу принять клиента:</span>
                                    @if($profile->place == 'master')
                                        <span class="card__item-content">У себя</span>
                                    @elseif($profile->place == 'client')
                                        <span class="card__item-content">У клиента</span>
                                    @elseif($profile->place == 'both')
                                        <span class="card__item-content">У себя или у клиента</span>
                                    @endif
                            </p>
                        @endif
                        @if(!is_null($profile->about))
                            <p class="card__item about card__item_column">
                                <span class="card__item-title">Обо мне: </span>
                                <span class="card__item-content">{{ $profile->about }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->education))
                            <p class="card__item education card__item_column">
                                <span class="card__item-title">Образование: </span>
                                <span class="card__item-content">{{ $profile->education }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->experience))
                            <p class="card__item experience card__item_column">
                                <span class="card__item-title">Опыт: </span>
                                <span class="card__item-content">{{ $profile->experience }}</span>
                            </p>
                        @endif
                    @else
                        <p class="card__item card__item_column">
                            <span class="card__item-title">Email: </span>
                            <span class="card__item-content">{{ $profile->user->email }}</span>
                        </p>
                        @if(!is_null($profile->user->phone))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Номер телефона: </span>
                                <span class="card__item-content">{{ $profile->user->phone }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->country))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Страна: </span>
                                <span class="card__item-content">{{ $profile->country }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->region))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Область/Регион: </span>
                                <span class="card__item-content">{{ $profile->region }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->district))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Район: </span>
                                <span class="card__item-content">{{ $profile->district }}</span>
                            </p>
                        @endif
                        @if(!is_null($profile->city))
                            <p class="card__item card__item_column">
                                <span class="card__item-title">Город: </span>
                                <span class="card__item-content">{{ $profile->city }}</span>
                            </p>
                        @endif
                    @endif

                    @if($profile->user_id == auth()->id())
                            <div class="card__item card__item_column card__item-btn">
                                <div class="btn-container">
                                    <a href="{{ route('profiles.edit', ['profile' => $profile->id]) }}"
                                       class="button button_colored button_shadowed">Редактировать профиль</a>
                                </div>
                            </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection