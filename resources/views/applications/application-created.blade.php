@extends('layouts.main')

@section('page-title')Заявка сохранена@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Создание заявки</h1>
            <p class="page-description">Ваша заявка сохранена!</p>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection