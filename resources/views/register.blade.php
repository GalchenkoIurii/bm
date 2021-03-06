@extends('layouts.main')

@section('page-title')Регистрация @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Регистрация</h1>
            <p class="page-description">Введите имя, Email и пароль, а также если Вы мастер, поставьте отметку - "Я мастер"</p>
            <div class="form-container">
                <form action="{{ route('register.store') }}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="first_name" class="form-group__label">Имя</label>
                        <div class="form-group__input">
                            <input type="text" name="first_name" id="first_name"
                                   value="{{ old('first_name') }}" required>
                        </div>
                        @error('first_name')
                            <div class="form-group__status error">{{ $message }}</div>
                        @enderror
                    </div>
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
                        <label for="password" class="form-group__label">Пароль</label>
                        <div class="form-group__input">
                            <input type="password" name="password" id="password" required>
                        </div>
                        @error('password')
                            <div class="form-group__status error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-group__label">Повторите пароль</label>
                        <div class="form-group__input">
                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        @error('password_confirmation')
                            <div class="form-group__status error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group-checkbox">
                        <input type="checkbox" name="is_master" id="is_master">
                        <label for="is_master" class="form-group-checkbox__label">Я мастер</label>
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