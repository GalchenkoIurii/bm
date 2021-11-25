@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Теги постов</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление тегами постов</h3>
        </div>
        <div class="card-body table-responsive">
            <a class="btn btn-primary mb-2" href="{{ route('admin.post-tags.create') }}" role="button">Добавить тег</a>
            @if($tags->isNotEmpty())
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Слаг</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->id }}</th>
                            <td>{{ $tag->title }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.post-tags.edit', ['post_tag' => $tag->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.post-tags.destroy', ['post_tag' => $tag->id]) }}" method="post" class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Подтвердите удаление')">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>Данных нет...</div>
            @endif
        </div>
    </div>
@endsection