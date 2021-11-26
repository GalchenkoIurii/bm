@extends('admin.layouts.main')

@section('styles')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    @endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление поста</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новый пост</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Краткое описание</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Контент</label>
                    <textarea class="form-control" id="content" name="content" rows="8"></textarea>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="post_category_id">Категории</label>
                    <select class="form-select" name="post_category_id" id="post_category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" multiple="multiple" name="post_tags_id[]" id="post_tags_id">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="input-group-text" for="image">Изображение поста</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#post_tags_id').select2({
                placeholder: "Выберите теги для поста"
            });
        });
    </script>
    @endsection