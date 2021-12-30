@extends('layouts.main')

@section('page-title')Контакты @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Контакты</h1>
            <address>
                <p class="page-description">По техническим вопросам, связанным с работой сервиса, Вы можете связаться с командой разработчиков по электронной почте: </p>
                <a href="mailto:smarttechsoft19@gmail.com">smarttechsoft19@gmail.com</a>
            </address>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection