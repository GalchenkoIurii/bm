@extends('layouts.main')

@section('page-title'){{ __('home.title') }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="intro">
        <div class="container">
            <h1 class="page-header">Home page</h1>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection