@extends('layouts.main')

@section('page-keywords'){{ \Illuminate\Support\Str::replace(
' ', ', ', \Illuminate\Support\Str::remove(',', $postData->title)
) }}@endsection

@section('page-description'){{ $postData->description }}@endsection

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title'){{ $postData->title }}@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            {{ Breadcrumbs::render('post', $postData) }}
        </div>
    </section>
    <section class="section">
        <div class="container">
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

            <article class="post">
                <h1 class="page-header">{{ $postData->title }}</h1>
                @if(!is_null($postData->image))
                    <div class="post-img post__item photo-preview">
                        <img src="{{ asset('storage/' . $postData->image) }}" alt="Изображение {{ $postData->title }}">
                    </div>
                @endif
                <div class="post-meta post__item">
                    <p class="post-meta__item">
                        <span class="card__item-label"><i class="fas fa-calendar-alt"></i></span>
                        <span class="card__item-text">
                            {{ date('d.m.Y', strtotime($postData->created_at)) }}
                        </span>
                    </p>
                    <p class="post-meta__item">
                        <span class="card__item-label"><i class="fas fa-eye"></i></span>
                        <span class="card__item-text">
                            {{ $postData->views }}
                        </span>
                    </p>
                    <p class="post-meta__item">
                        <span class="card__item-label"><i class="fas fa-tags"></i></span>
                        <span class="card__item-text">
                            {{ $postData->postTags->pluck('title')->join(', ') }}
                        </span>
                    </p>
                </div>
                <div class="post-description post__item">{{ $postData->description }}</div>
                <div class="post-content post__item">{{ $postData->content }}</div>
                <div class="post-author post__item post__item_centered">
                    <div class="avatar-box">
                        <div class="avatar">
                            <div class="avatar__square">
                                <img src="{{ asset('storage/' . $postData->user->profile->avatar) }}" alt="" class="avatar__image">
                            </div>
                        </div>
                        @if($postData->user->isOnline())
                            <p class="avatar-box__status status-online">online</p>
                        @else
                            <p class="avatar-box__status status-not-online">не в сети</p>
                        @endif
                    </div>
                    <div class="name-box">
                        <h2 class="name-header">{{ $postData->user->first_name }} {{ $postData->user->last_name }}</h2>
                        <div class="stars-box">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="responses">
                                <p class="responses__text">отзывов - 0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-container">
                    <a href="{{ route('profiles.show', ['profile' => $postData->user->id]) }}"
                       class="button button_colored button_shadowed">Профиль автора</a>
                </div>
            </article>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection