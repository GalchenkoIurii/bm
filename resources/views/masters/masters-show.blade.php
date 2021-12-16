@extends('layouts.main')

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Мастера - результат поиска@endsection

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
                @foreach($service_data as $user)
                    <div class="card-box">
                        <div class="card">
                            <div class="card__item card__item_centered">
                                <div class="avatar-box">
                                    <div class="avatar">
                                        <div class="avatar__square">
                                            <img src="{{ $user->profile()->getAvatar() }}" alt="" class="avatar__image">
                                        </div>
                                    </div>
                                    @if($profile->user->isOnline())
                                        <p class="avatar-box__status status-online">online</p>
                                    @else
                                        <p class="avatar-box__status status-not-online">не в сети</p>
                                    @endif
                                </div>
                                <div class="name-box">
                                    <h1 class="page-header">{{ $user->first_name }} {{ $user->last_name }}</h1>
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
                            @if($user->is_master)
                                <p class="card__item card__item_column">
                                    <span class="card__item-title">Email: </span>
                                    <span class="card__item-content">{{ $user->email }}</span>
                                </p>
                                @if(!is_null($user->phone))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Номер телефона: </span>
                                        <span class="card__item-content">{{ $user->phone }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->country))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Страна: </span>
                                        <span class="card__item-content">{{ $user->profile->country }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->region))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Область/Регион: </span>
                                        <span class="card__item-content">{{ $user->profile->region }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->district))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Район: </span>
                                        <span class="card__item-content">{{ $user->profile->district }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->city))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Город: </span>
                                        <span class="card__item-content">{{ $user->profile->city }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->street))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Улица: </span>
                                        <span class="card__item-content">{{ $user->profile->street }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->house))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Номер дома: </span>
                                        <span class="card__item-content">{{ $user->profile->house }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->locale_num))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Номер помещения/квартиры: </span>
                                        <span class="card__item-content">{{ $user->profile->locale_num }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->place))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Где могу принять клиента:</span>
                                        @if($user->profile->place == 'master')
                                            <span class="card__item-content">У себя</span>
                                        @elseif($user->profile->place == 'client')
                                            <span class="card__item-content">У клиента</span>
                                        @elseif($user->profile->place == 'both')
                                            <span class="card__item-content">У себя или у клиента</span>
                                        @endif
                                    </p>
                                @endif
                                @if(!is_null($user->profile->about))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Обо мне: </span>
                                        <span class="card__item-content">{{ $user->profile->about }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->education))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Образование: </span>
                                        <span class="card__item-content">{{ $user->profile->education }}</span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->experience))
                                    <p class="card__item card__item_column">
                                        <span class="card__item-title">Опыт: </span>
                                        <span class="card__item-content">{{ $user->profile->experience }}</span>
                                    </p>
                                @endif
                            @endif

                        </div>
                    </div>
                    @endforeach


        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection