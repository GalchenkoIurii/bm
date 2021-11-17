@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование категории</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                </div>
                {{--<div class="mb-3">--}}
                    {{--<label for="logo" class="form-label">Лого</label>--}}
                    {{--<input type="text" class="form-control" id="logo" name="logo" value="{{ $category->logo }}">--}}
                {{--</div>--}}

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection