@extends('layouts.main')

@section('page-title')Заявки@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Заявки</h1>

            @foreach($applications as $application)
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
                @endforeach
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection