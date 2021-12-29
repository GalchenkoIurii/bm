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
            <h1 class="page-header">Мастера - результат поиска</h1>

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

                @if($users->isNotEmpty())
                    <div class="card-box masters-box">
                @foreach($users as $user)
                            <a href="{{ route('profiles.show', ['profile' => $user->profile->id]) }}">
                        <div class="card card_mb master-card">
                            <div class="master-card__item master-card__item_centered">
                                <div class="avatar-box">
                                    <div class="avatar">
                                        <div class="avatar__square">
                                            <img src="{{ asset('storage/' . $user->profile->avatar) }}" alt="" class="avatar__image">
                                        </div>
                                    </div>
                                    @if($user->isOnline())
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
                                @if(
                                    !is_null($user->profile->country)
                                    || !is_null($user->profile->region)
                                    || !is_null($user->profile->district)
                                    || !is_null($user->profile->city)
                                )
                                    <p class="master-card__item master-card__item_centered">
                                        <span class="master-card__item-label"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="master-card__item-text">
                                                {{ $user->profile->country }}
                                                {{ $user->profile->region }}
                                                {{ $user->profile->district }}
                                                {{ $user->profile->city }}
                                        </span>
                                    </p>
                                @endif
                                @if(!is_null($user->profile->place))
                                    <p class="master-card__item master-card__item_column">
                                        <span class="master-card__item-title">Где могу принять клиента:</span>
                                        @if($user->profile->place == 'master')
                                            <span class="master-card__item-content">У себя</span>
                                        @elseif($user->profile->place == 'client')
                                            <span class="master-card__item-content">У клиента</span>
                                        @elseif($user->profile->place == 'both')
                                            <span class="master-card__item-content">У себя или у клиента</span>
                                        @endif
                                    </p>
                                @endif
                            @endif
                        </div>
                            </a>
                    @endforeach
                        <a href="#" class="card-invisible"></a>
                    </div>
                    {{ $users->links('pagination.pagination') }}
                @else
                    <h3 class="page-description">По данной услуге пока нет мастеров...</h3>
                @endif
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection