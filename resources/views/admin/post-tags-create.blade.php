@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление тегов постов</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Новый тег постов</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.post-tags.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection