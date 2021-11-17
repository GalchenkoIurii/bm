@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление категории</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новая категория</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Слаг</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                {{--<div class="mb-3">--}}
                    {{--<label for="logo" class="form-label">Лого</label>--}}
                    {{--<input type="text" class="form-control" id="logo" name="logo">--}}
                {{--</div>--}}

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection