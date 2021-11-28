@extends('layouts.main')

@section('page-title')Поиск мастера @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Найдите своего мастера</h1>
            <div class="accordion-box">
                @if($categories->isNotEmpty())
                    @foreach($categories as $category)
                        <details class="accordion accordion-box__item">
                            <summary class="accordion__title">
                                <span>{{ $category->name }}</span>
                            </summary>
                            <ul class="accordion__text">
                                @foreach($category->services as $service)
                                        <li class="accordion__item"><a href="#">{{ $service->name }}</a></li>
                                    @endforeach
                            </ul>
                        </details>
                        @endforeach
                    @else
                        <h3 class="page-description">Категорий нет...</h3>
                    @endif
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection