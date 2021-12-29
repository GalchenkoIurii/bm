@extends('layouts.main')

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Заявки клиентов@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Заявки клиентов</h1>

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

            @if($applications->isNotEmpty())
                <div class="card-box">
                @foreach($applications as $application)
                        <a href="{{ route('applications.show', ['application' => $application->id]) }}">
                            <div class="card card_mb">
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
                                @endif
                            </div>
                        </a>
                @endforeach
                    <a href="#" class="card-invisible"></a>
                </div>
                    {{ $applications->links('pagination.pagination') }}
            @else
                <h3 class="page-description">По Вашим услугам пока нет заявок...</h3>
            @endif

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection