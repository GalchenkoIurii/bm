@extends('layouts.main')

@section('page-title')Создание заявки@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Создание заявки</h1>
            {{--<p class="page-description">Выберите категорию необходимой Вам услуги</p>--}}
            <div class="form-container">
                <form action="{{ route('applications.store') }}" method="post" class="form">
                    @csrf
                    <div class="form-group data-block">
                        <div class="select" id="category-select">
                            <button type="button" class="select__toggle" name="category_id" value="" data-select="toggle" data-index="0">
                                Выберите категорию
                            </button>
                            <div class="select__dropdown">
                                <ul class="select__options">
                                    @php $index = 0; @endphp
                                    @foreach($categories as $category)
                                        <li class="select__option" data-select="option" data-value="{{ $category->id }}"
                                            data-index="{{ $index++ }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group data-block">
                        <div class="select" id="category-select"></div>
                    </div>


                    <div class="form-group">
                        <div class="btn-container">
                            <button id="btn-prev" type="submit" class="button button_colored button_shadowed button_margined">Назад</button>
                            <button id="btn-next" type="submit" class="button button_colored button_shadowed">Далее</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection