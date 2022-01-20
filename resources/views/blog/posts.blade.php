@extends('layouts.main')

@section('page-keywords')Мастер, Бьютимастер, Блог, Бьютиблог, Маникюр, Парикмахер, Косметолог@endsection

@section('page-description')Бьюти блог. Блог о красоте и здоровье. Найдите мастера, который позаботится о Вашей красоте.
Косметологи, парикмахеры, мастера маникюра и другие профессионалы рядом с Вами.@endsection

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title')Блог@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            {{ Breadcrumbs::render('blog') }}
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h1 class="page-header">Посты</h1>

            @if(session()->has('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="error-message">{{ $error }}</p>
                @endforeach
            @endif
            @if(session()->has('success'))
                <p class="status-message">{{ session('success') }}</p>
            @endif

            @if($posts->isNotEmpty())
                <div class="card-box">
                @foreach($posts as $post)
                        <a href="{{ route('blog.show', ['post' => $post->id]) }}">
                            <div class="card card_mb">
                                <p class="card__item">
                                    <span class="post-card__title">{{ \Illuminate\Support\Str::words($post->title, 10, ' ...') }}</span>
                                </p>
                                <div class="card__item post-card-meta">
                                    <p class="post-card-meta__item">
                                        <span class="card__item-label"><i class="fas fa-calendar-alt"></i></span>
                                        <span class="card__item-text">
                                            {{ date('d.m.Y', strtotime($post->created_at)) }}
                                        </span>
                                    </p>
                                    <p class="post-card-meta__item">
                                        <span class="card__item-label"><i class="fas fa-eye"></i></span>
                                        <span class="card__item-text">
                                            {{ $post->views }}
                                        </span>
                                    </p>
                                    <p class="post-card-meta__item">
                                        <span class="card__item-label"><i class="fas fa-tags"></i></span>
                                        <span class="card__item-text">
                                            {{ $post->postTags->pluck('title')->join(', ') }}
                                        </span>
                                    </p>
                                </div>
                                <p class="card__item">
                                    <span class="post-card__description">{{ \Illuminate\Support\Str::words($post->description, 16, ' >>>') }}</span>
                                </p>
                            </div>
                        </a>
                @endforeach
                    <a href="#" class="card-invisible"></a>
                </div>
                    {{ $posts->links('pagination.pagination') }}
            @else
                <h3 class="page-description">Постов пока нет...</h3>
            @endif

        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection