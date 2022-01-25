@extends('layouts.main')

@section('page-keywords'){{ \Illuminate\Support\Str::replace(
' ', ', ', \Illuminate\Support\Str::remove(',', $postData->title)
) }}@endsection

@section('page-description'){{ $postData->description }}@endsection

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Редактирование {{ $postData->title }}@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            {{ Breadcrumbs::render('post.edit', $postData) }}
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
                <h1 class="page-header">Редактирование поста {{ $postData->title }}</h1>
                <div class="card">
                    <form action="{{ route('blog.update', ['post' => $postData->id]) }}" method="post" class="form"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card__form-group">
                            <label for="title" class="card__form-group-label">Название поста</label>
                            <div class="card__form-group-input">
                                <input type="text" name="title" id="title" value="{{ $postData->title }}">
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="description" class="card__form-group-label">Краткое описание поста</label>
                            <div class="card__form-group-input">
                                <textarea name="description"
                                          id="description"
                                          class="card__form-group_text-md"
                                >{{ $postData->description }}</textarea>
                            </div>
                        </div>
                        <div class="card__form-group">
                            <label for="content" class="card__form-group-label">Контент поста</label>
                            <div class="card__form-group-input">
                                <textarea name="content"
                                          id="content"
                                          class="card__form-group_text-lg"
                                >{{ $postData->content }}</textarea>
                            </div>
                        </div>
                        <div class="card__form-group card__file-input file-input">
                            <span class="card__item-title">Добавьте изображение поста (не обязательно)</span>
                            <label for="profile-photo" class="form-group__label file-input__label">Выберите фото...</label>
                            <div class="form-group__input" style="display: none">
                                <input type="file" class="file-input__input" name="image" id="profile-photo">
                            </div>
                            @if(!is_null($postData->image))
                                <div class="photo-preview">
                                    <img id="profile-photo-preview"
                                         src="{{ asset('storage/' . $postData->image) }}"
                                         alt="Изображение {{ $postData->title }}">
                                </div>
                            @endif
                        </div>
                        <div class="card__form-group">
                            <label for="category_id" class="card__form-group-label">Категория</label>
                            <div id="category-select" class="select">
                                <select name="post_category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option
                                                value="{{ $category->id }}"
                                                @if($category->id === $postData->post_category_id)
                                                    selected
                                                @endif
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="post-tags-select-box" class="card__form-group">
                            <label class="card__form-group-label">Тэги (не обязательно)</label>
                            <div class="form-group-checkbox">
                                @foreach($tags as $tag)
                                    <input
                                            type="checkbox"
                                            name="post_tags_id[]"
                                            id="{{ $tag->id }}"
                                            value="{{ $tag->id }}"
                                            @if(in_array($tag->id, $postData->postTags->pluck('id')->all()))
                                                checked
                                            @endif
                                    >
                                    <label for="{{ $tag->id }}" class="form-group-checkbox__label">{{ $tag->title }}</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="btn-container">
                            <button type="submit"
                                    class="button button_colored button_shadowed">Обновить</button>
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