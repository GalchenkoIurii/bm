@extends('layouts.main')

@section('page-title'){{ __('home.title') }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Регистрация</h1>
            <p class="page-description"></p>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection