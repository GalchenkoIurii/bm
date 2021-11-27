@extends('layouts.main')

@section('page-title')Восстановление пароля @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Восстановление пароля</h1>
            <p class="page-description">Введите новый пароль</p>
            <div class="form-container">
                <form action="{{ route('password.update') }}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email" class="form-group__label">Email</label>
                        <div class="form-group__input">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
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
                            <button type="submit" class="button button_colored button_shadowed">Сохранить</button>
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