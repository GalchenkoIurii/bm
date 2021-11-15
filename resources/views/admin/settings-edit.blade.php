@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование настройки</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $setting->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update', ['setting' => $setting->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $setting->slug }}">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $setting->title }}">
                </div>
                <div class="mb-3">
                    <label for="value" class="form-label">Контент</label>
                    <input type="text" class="form-control" id="value" name="value" value="{{ $setting->value }}">
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection