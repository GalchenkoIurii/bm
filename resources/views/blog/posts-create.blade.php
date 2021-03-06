@extends('layouts.main')

@section('page-keywords')Мастер, Бьютимастер, Блог, Пост, Бьютиблог, Маникюр, Парикмахер, Косметолог@endsection

@section('page-description')Бьюти блог. Создание поста. Блог о красоте и здоровье. Найдите мастера, который позаботится о Вашей красоте.
Косметологи, парикмахеры, мастера маникюра и другие профессионалы рядом с Вами.@endsection

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Создание поста@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            {{ Breadcrumbs::render('blog.create') }}
        </div>
    </section>
    <section class="section">
        <div class="container">
            @if(session()->has('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="error-message">{{ $error }}</p>
                @endforeach
            @endif
            @if(session()->has('success'))
                <p class="status-message">{{ session('success') }}</p>
            @endif

            <article class="post">
                <h1 class="page-header">Создание поста</h1>
                <div class="card">
                    <form action="{{ route('blog.store') }}" method="post" class="form"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card__form-group">
                            <label for="title" class="card__form-group-label">Название поста</label>
                            <div class="card__form-group-input">
                                <input type="text" name="title" id="title">
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="description" class="card__form-group-label">Краткое описание поста</label>
                            <div class="card__form-group-input">
                                <textarea name="description" id="description" class="card__form-group_text-md"></textarea>
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="content" class="card__form-group-label">Контент поста</label>
                            <div class="card__form-group-input">
                                <textarea name="content" id="content" class="card__form-group_text-lg"></textarea>
                            </div>
                        </div>
                        <div class="card__form-group card__file-input file-input">
                            <span class="card__item-title">Добавьте изображение поста (не обязательно)</span>
                            <label for="profile-photo" class="form-group__label file-input__label">Выберите фото...</label>
                            <div class="form-group__input" style="display: none">
                                <input type="file" class="file-input__input" name="image" id="profile-photo">
                            </div>
                            <div class="photo-preview">
                                <img id="profile-photo-preview" src="" alt="">
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="category_id" class="card__form-group-label">Категория</label>
                            <div id="category-select" class="select">
                                <select name="post_category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="post-tags-select-box" class="card__form-group">
                            <details class="post-accordion">
                                <summary class="post-accordion__title">
                                    <label class="card__form-group-label">Тэги (не обязательно)</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="post-accordion__title-icon">
                                        <path d="M18.71,8.21a1,1,0,0,0-1.42,0l-4.58,4.58a1,1,0,0,1-1.42,0L6.71,8.21a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.59,4.59a3,3,0,0,0,4.24,0l4.59-4.59A1,1,0,0,0,18.71,8.21Z"/>
                                    </svg>
                                </summary>
                                @if($tags->isNotEmpty())
                                    <div class="form-group-checkbox post-accordion__content">
                                        @foreach($tags as $tag)
                                            <input type="checkbox" name="post_tags_id[]" id="{{ $tag->id }}" value="{{ $tag->id }}">
                                            <label for="{{ $tag->id }}" class="form-group-checkbox__label post-accordion__item">{{ $tag->title }}</label>
                                        @endforeach
                                    </div>
                                @else
                                    <label class="card__form-group-label post-accordion__content">Тэгов пока нет...</label>
                                @endif
                            </details>
                        </div>

                        <div class="btn-container">
                            <button type="submit"
                                    class="button button_colored button_shadowed">Сохранить</button>
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection