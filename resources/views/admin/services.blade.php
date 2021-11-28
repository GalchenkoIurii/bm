@extends('admin.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Услуги</h1>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <h3>Управление услугами</h3>
        </div>
        <div class="card-body table-responsive">
            <a class="btn btn-primary mb-2" href="{{ route('admin.services.create') }}" role="button">Добавить услугу</a>
            @if($services->isNotEmpty())
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Слаг</th>
                        <th scope="col">Категория</th>
                        {{--<th scope="col">Лого</th>--}}
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <th scope="row">{{ $service->id }}</th>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->slug }}</td>
                            <td>{{ $service->category->name }}</td>
                            {{--<td>{{ $service->logo }}</td>--}}
                            <td class="d-flex">
                                <a href="{{ route('admin.services.edit', ['service' => $service->id]) }}"
                                   class="btn btn-info btn-sm me-1">Редактировать</a>
                                <form action="{{ route('admin.services.destroy', ['service' => $service->id]) }}" method="post" class="">
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
    {{ $services->links('admin.pagination.pagination') }}
@endsection