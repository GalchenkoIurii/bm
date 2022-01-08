@extends('layouts.main')

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Заявка@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Заявка # {{ $application->id }}</h1>

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

                <div class="card card_mb">
                    <div class="card__item card__item_centered card__item_hr-bottom">
                        <div class="avatar-box">
                            <div class="avatar">
                                <div class="avatar__square">
                                    <img src="{{ asset('storage/' . $application->user->profile->avatar) }}" alt="" class="avatar__image">
                                </div>
                            </div>
                            @if($application->user->isOnline())
                                <p class="avatar-box__status status-online">online</p>
                            @else
                                <p class="avatar-box__status status-not-online">не в сети</p>
                            @endif
                        </div>
                        <div class="name-box">
                            <h1 class="page-header">{{ $application->user->first_name }} {{ $application->user->last_name }}</h1>
                        </div>
                    </div>
                    <p class="card__item">
                        <span class="card__item-title">Категория:</span>
                        <span class="card__item-content">{{ $application->category->name }}</span>
                    </p>
                    <p class="card__item">
                        <span class="card__item-title">Услуга:</span>
                        <span class="card__item-content">{{ $application->service->name }}</span>
                    </p>
                    @if(
                        !is_null($application->start_price)
                        || !is_null($application->end_price)
                    )
                        <p class="card__item card__item_centered">
                            <span class="card__item-label"><i class="fas fa-dollar-sign"></i></span>
                            <span class="card__item-text">
                                                от {{ $application->start_price }} до {{ $application->end_price }} грн.
                                        </span>
                        </p>
                    @endif
                    @if(
                        !is_null($application->start_date)
                        || !is_null($application->end_date)
                    )
                        <p class="card__item card__item_centered">
                            <span class="card__item-label"><i class="fas fa-calendar-alt"></i></span>
                            <span class="card__item-text">
                                                с {{ date('d.m.Y', strtotime($application->start_date)) }} до {{ date('d.m.Y', strtotime($application->end_date)) }}
                                        </span>
                        </p>
                    @endif
                    @if(!is_null($application->place))
                        <p class="card__item card__item_column card__item_hr-top">
                            <span class="card__item-title">Где могу получить услугу:</span>
                            @if($application->place == 'master')
                                <span class="card__item-content">У мастера</span>
                            @elseif($application->place == 'client')
                                <span class="card__item-content">У себя</span>
                            @elseif($application->place == 'both')
                                <span class="card__item-content">У себя или у мастера</span>
                            @endif
                        </p>
                    @endif

                </div>
            <details class="accordion accordion-box__item">
                <summary class="accordion__title">
                    <span>Фото</span>
                </summary>
                <div class="accordion__text">
                    @if(!is_null($application->photo))
                        <div class="photo-preview">
                            <img src="{{ asset('storage/' . $application->photo) }}" alt="">
                        </div>
                    @else
                        <p class="card__item card__item_centered">
                            <span class="card__item-text">Заказчик не оставил фото при создании заявки...</span>
                        </p>
                    @endif
                </div>
            </details>
            <details class="accordion accordion-box__item">
                <summary class="accordion__title">
                    <span>Контакты</span>
                </summary>
                <div class="accordion__text">
                    @if(
                        !is_null($application->country)
                        || !is_null($application->region)
                        || !is_null($application->district)
                        || !is_null($application->city)
                    )
                        <p class="card__item card__item_centered">
                            <span class="card__item-label"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="card__item-text">
                                {{ $application->country }}
                                {{ $application->region }}
                                {{ $application->district }}
                                {{ $application->city }}
                            </span>
                        </p>
                        <p class="card__item card__item_centered">
                            <span class="card__item-text">Полный список контактов будет доступен после того, как заказчик выберет Вас исполнителем.</span>
                        </p>
                    @else
                        <p class="card__item card__item_centered">
                            <span class="card__item-text">Заказчик не оставил свои контакты при создании заявки...</span>
                        </p>
                    @endif
                </div>
            </details>
                <div class="btn-container">
                    <a href="{{ route('applications.offer.create', ['application' => $application->id]) }}"
                       class="button button_colored button_shadowed">Предложить услугу</a>
                </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection