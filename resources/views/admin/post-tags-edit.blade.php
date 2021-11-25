@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование тега постов</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>{{ $tag->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.post-tags.update', ['post_tag' => $tag->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}">
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection