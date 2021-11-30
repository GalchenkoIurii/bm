@extends('layouts.main')

@section('page-title')Создание заявки @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Создание заявки</h1>
            <p class="page-description">Выберите категорию необходимой Вам услуги</p>
            <div class="form-container">
                <form action="{{ route('applications.store') }}" method="post" class="form">
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
                        <div class="btn-container">
                            <button type="submit" class="button button_colored button_shadowed">Далее</button>
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