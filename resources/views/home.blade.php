@extends('layouts.main')

@section('page-title'){{ __('home.title') }} @endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="intro">
        <div class="container">
            <h1 class="page-header">Найдите мастера, который позаботится о Вашей красоте</h1>
            <p class="page-description">Косметологи, парикмахеры, мастера маникюра и другие профессионалы рядом с Вами</p>
            <div class="btn-container">
                <a href="{{ route('search') }}" class="button button_alternate">Найти мастера</a>
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <div class="accordion-box">
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 1</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2 Подкатегория 2 Подка</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 2</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 3</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 4</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 5</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 6</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 7</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
                <details class="accordion accordion-box__item">
                    <summary class="accordion__title">
                        <span>Категория 8</span>
                    </summary>
                    <ul class="accordion__text">
                        <li class="accordion__item"><a href="#">Подкатегория 1</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 2</a></li>
                        <li class="accordion__item"><a href="#">Подкатегория 3</a></li>
                    </ul>
                </details>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection