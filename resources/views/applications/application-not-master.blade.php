@extends('layouts.main')

@section('page-title')Заявка не доступна для просмотра@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Заявка не доступна для просмотра</h1>
            <p class="page-description">Вы зарегистрированы как пользователь. Для просмотра заявок пользователей
                Вам необходимо иметь статус мастера.</p>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection