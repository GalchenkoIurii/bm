@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории постов</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление категориями постов</h3>
        </div>
        <div class="card-body table-responsive">
            <a class="btn btn-primary mb-2" href="{{ route('admin.post-categories.create') }}" role="button">Добавить категорию</a>
            @if($categories->isNotEmpty())
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
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.post-categories.edit', ['post_category' => $category->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.post-categories.destroy', ['post_category' => $category->id]) }}" method="post" class="">
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