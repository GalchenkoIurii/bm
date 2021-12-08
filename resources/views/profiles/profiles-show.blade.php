@extends('layouts.main')

@section('page-title')Профиль пользователя@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h1>

            @if($profile->user->is_master)
                <p class="page-description">
                    Email: {{ $profile->user->email }} <br>
                    Номер телефона: {{ $profile->user->phone }} <br>
                    Аватар: {{ $profile->avatar }} <br>
                    Страна: {{ $profile->country }} <br>
                    Область/Регион: {{ $profile->region }} <br>
                    Район: {{ $profile->district }} <br>
                    Город: {{ $profile->city }} <br>
                    Улица: {{ $profile->street }} <br>
                    Номер дома: {{ $profile->house }} <br>
                    Номер помещения/квартиры: {{ $profile->locale_num }} <br>
                    Место: {{ $profile->place }} <br>
                    Обо мне: {{ $profile->about }} <br>
                    Образование: {{ $profile->education }} <br>
                    Опыт: {{ $profile->experience }} <br>
                </p>
            @else
                <p class="page-description">
                    Email: {{ $profile->user->email }} <br>
                    Номер телефона: {{ $profile->user->phone }} <br>
                    Аватар: {{ $profile->avatar }} <br>
                    Страна: {{ $profile->user->country }} <br>
                    Область/Регион: {{ $profile->user->region }} <br>
                    Район: {{ $profile->user->district }} <br>
                    Город: {{ $profile->user->city }} <br>
                </p>
            @endif

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection