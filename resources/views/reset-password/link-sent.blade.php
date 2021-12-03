@extends('layouts.main')

@section('page-title')Восстановление пароля @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="forgot-password">
                <h1 class="page-header">Ссылка отправлена</h1>
                <p class="forgot-password__text">Ссылка для восстановления пароля отправлена на Ваш Email</p>
                <a href="{{ route('home') }}" class="button button_alternate button_shadowed">На главную страницу</a>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection