@extends('layouts.main')

@section('page-keywords')Мастер, Маникюр, Парикмахер, Косметолог@endsection

@section('page-description')Найдите мастера, который позаботится о Вашей красоте. Косметологи, парикмахеры, мастера
маникюра и другие профессионалы рядом с Вами ...или оставьте заявку и мастер найдет Вас.@endsection

@section('page-title')Главная@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Найдите мастера, который позаботится о Вашей красоте</h1>
            <p class="page-description">Косметологи, парикмахеры, мастера маникюра и другие профессионалы рядом с Вами</p>
            <div class="btn-container">
                <a href="{{ route('search') }}" class="button button_colored button_shadowed">Найти мастера</a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h2 class="page-subheader">...или оставьте заявку и мастер найдет Вас</h2>
            <div class="btn-container">
                <a href="{{ route('applications.create') }}" class="button button_colored button_shadowed">Оставить заявку</a>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection