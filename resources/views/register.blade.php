@extends('layouts.main')

@section('page-title')Регистрация @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Регистрация</h1>
            <p class="page-description">Введите имя, Email или номер телефона и пароль</p>
            <div class="form-container">
                <form action="{{ route('register.store') }}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="first_name" class="form-group__label">Имя</label>
                        <div class="form-group__input">
                            <input type="text" name="first_name" id="first_name"
                                   value="{{ old('first_name') }}" required>
                        </div>
                        <div class="form-group__status"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-group__label">Email</label>
                        <div class="form-group__input">
                            <input type="email" name="email" id="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group__status"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-group__label">Номер телефона</label>
                        <div class="form-group__input">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group__status"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-group__label">Пароль</label>
                        <div class="form-group__input">
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group__status"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-group__label">Повторите пароль</label>
                        <div class="form-group__input">
                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        <div class="form-group__status"></div>
                    </div>
                    <div class="form-group">
                        <div class="btn-container">
                            <button type="submit" class="button button_colored button_shadowed">Зарегистрироваться</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection