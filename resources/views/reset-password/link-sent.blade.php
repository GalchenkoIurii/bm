@extends('layouts.main')

@section('page-title')Восстановление пароля @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Ссылка отправлена</h1>
            <p class="page-description">Ссылка для восстановления пароля отправлена на Ваш Email</p>
            <a href="{{ route('home') }}">На главную страницу</a>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection