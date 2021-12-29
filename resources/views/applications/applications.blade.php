@extends('layouts.main')

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
                            <p class="page-description">
                                Категория: {{ $application->category->name }} <br>
                                Услуга: {{ $application->service->name }} <br>
                                Цена: от {{ $application->start_price }} грн. до {{ $application->end_price }} грн. <br>
                                Даты: от {{ $application->start_date }} до {{ $application->end_date }} <br>
                                Место: {{ $application->place }} <br>
                                Страна: {{ $application->country }} <br>
                                Регион: {{ $application->region }} <br>
                                Город: {{ $application->city }} <br>
                                Пользователь: {{ $application->user->first_name }} <br>
                            </p>
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