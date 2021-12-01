@extends('layouts.main')

@section('page-title')Создание заявки@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Создание заявки</h1>
            <div class="form-container">
                <form action="{{ route('applications.store') }}" method="post" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" data-block="1">
                        <div class="select" id="category-select">
                            <button type="button" class="select__toggle" id="category_id" name="category_id" value=""
                                    data-select="toggle" data-index="0">
                                Выберите категорию
                            </button>
                            <div class="select__dropdown">
                                <ul class="select__options">
                                    @php $index = 0; @endphp
                                    @foreach($categories as $category)
                                        <li class="select__option" data-select="option" data-value="{{ $category->id }}"
                                            data-index="{{ $index++ }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-block="2">
                        <div class="select" id="service-select"></div>
                    </div>
                    <div class="form-group" data-block="3">
                        <h3 class="page-description">Сколько Вы готовы заплатить за услугу? (не обязательно)</h3>
                        <label for="start_price" class="form-group__label">От ... грн</label>
                        <div class="form-group__input">
                            <input type="number" name="start_price" id="start_price">
                        </div>
                        <label for="end_price" class="form-group__label">До ... грн</label>
                        <div class="form-group__input">
                            <input type="number" name="end_price" id="end_price">
                        </div>
                    </div>
                    <div class="form-group file-input" data-block="4">
                        <h3 class="page-description">Добавьте фото, чтобы мастера смогли оценить объем работы (не обязательно)</h3>
                        <label for="photo" class="form-group__label file-input__label">Выберите фото...</label>
                        <div class="form-group__input">
                            <input type="file" class="file-input__input" name="photo" id="photo">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="btn-container">
                            <button id="btn-prev" type="submit" class="button button_colored button_shadowed button_margined">Назад</button>
                            <button id="btn-next" type="submit" class="button button_colored button_shadowed">Далее</button>
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