@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование услуги</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $service->name }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.services.update', ['service' => $service->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $service->slug }}">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="category_id">Категории</label>
                    <select class="form-select" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option
                                    value="{{ $category->id }}"
                                    @if($category->id === $service->category_id)
                                        selected
                                        @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
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