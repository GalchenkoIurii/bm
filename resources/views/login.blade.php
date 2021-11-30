@extends('layouts.main')

@section('page-title')Вход @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Вход</h1>
            <p class="page-description">Введите Email или номер телефона</p>
            <div class="form-container">
                @if(session()->has('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif
                <form action="{{ route('login') }}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-group__label">Email</label>
                        <div class="form-group__input">
                            <input type="email" name="email" id="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="form-group__status error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-group__label">Номер телефона</label>
                        <div class="form-group__input">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                            <div class="form-group__status error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-group__label">Пароль</label>
                        <div class="form-group__input">
                            <input type="password" name="password" id="password" required>
                        </div>
                        @error('password')
                            <div class="form-group__status error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="btn-container">
                            <button type="submit" class="button button_colored button_shadowed">Войти</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="forgot-password">
                <p class="forgot-password__text">У Вас нет аккаунта?</p>
                <a href="{{ route('register.create') }}" class="button button_alternate button_shadowed">Зарегистрироваться</a>
            </div>
            <div class="forgot-password">
                <p class="forgot-password__text">Забыли пароль?</p>
                <a href="{{ route('password.request') }}" class="button button_alternate button_shadowed">Восстановить пароль</a>
            </div>

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection