@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Посты</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Управление постами</h3>
        </div>
        <div class="card-body table-responsive">
            <a class="btn btn-primary mb-2" href="{{ route('admin.posts.create') }}" role="button">Добавить пост</a>
            @if($posts->isNotEmpty())
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Теги</th>
                        <th scope="col">Просмотры</th>
                        <th scope="col">Ожидает подтверждения</th>
                        <th scope="col">Подтвержден</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->postCategory->title }}</td>
                            <td>
                                @foreach($post->postTags as $tag)
                                    <span>{{ $tag->title }}</span><br>
                                    @endforeach
                            </td>
                            <td>{{ $post->views }}</td>
                            <td>
                                @if($post->need_confirmation)
                                    <span class="badge bg-success">Да</span>
                                @else
                                    <span class="badge bg-danger">Нет</span>
                                @endif
                            </td>
                            <td>
                                @if($post->confirmed)
                                    <span class="badge bg-success">Да</span>
                                @else
                                    <span class="badge bg-danger">Нет</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" class="">
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