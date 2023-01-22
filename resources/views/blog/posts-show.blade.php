@extends('layouts.main')

@section('page-keywords'){{ \Illuminate\Support\Str::replace(
' ', ', ', \Illuminate\Support\Str::remove(',', $post->title)
) }}@endsection

@section('page-description'){{ $post->description }}@endsection

@section('styles')
    <link href="{{ asset('fa-web/css/all.css') }}" rel="stylesheet">
@endsection

@section('page-title'){{ $post->title }}@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            {{ Breadcrumbs::render('post', $post) }}
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
                <h1 class="page-header">{{ $post->title }}</h1>
                @if(!is_null($post->image))
                    <div class="post-img post__item photo-preview">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Изображение {{ $post->title }}">
                    </div>
                @endif
                <div class="post-meta post__item">
                    <p class="post-meta__item">
                        <span class="card__item-label"><i class="fas fa-calendar-alt"></i></span>
                        <span class="card__item-text">
                            {{ date('d.m.Y', strtotime($post->created_at)) }}
                        </span>
                    </p>
                    <p class="post-meta__item">
                        <span class="card__item-label"><i class="fas fa-eye"></i></span>
                        <span class="card__item-text">
                            {{ $post->views }}
                        </span>
                    </p>
                    <p class="post-meta__item">
                        <span class="card__item-label"><i class="fas fa-tags"></i></span>
                        <span class="card__item-text">
                            {{ $post->postTags->pluck('title')->join(', ') }}
                        </span>
                    </p>
                </div>
                <div class="post-description post__item">{{ $post->description }}</div>
                <div class="post-content post__item">{{ $post->content }}</div>
                @if($post->user->id == auth()->id())
                    <div class="btn-container post__item">
                        <a href="{{ route('blog.edit', ['post' => $post->id]) }}" class="button button_colored button_shadowed">Редактировать пост</a>
                    </div>
                    <form action="{{ route('blog.destroy', ['post' => $post->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="btn-container post__item">
                            <button type="submit" class="button button_danger button_shadowed"
                                    onclick="return confirm('Подтвердите удаление поста')">Удалить пост</button>
                        </div>
                    </form>
                @endif
                <div class="post-author post__item post__item_centered">
                    <div class="avatar-box">
                        <div class="avatar">
                            <div class="avatar__square">
                                <img src="{{ asset('storage/' . $post->user->profile->avatar) }}" alt="" class="avatar__image">
                            </div>
                        </div>
                        @if($post->user->isOnline())
                            <p class="avatar-box__status status-online">online</p>
                        @else
                            <p class="avatar-box__status status-not-online">не в сети</p>
                        @endif
                    </div>
                    <div class="name-box">
                        <h2 class="name-header">{{ $post->user->first_name }} {{ $post->user->last_name }}</h2>
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
                    <a href="{{ route('profiles.show', ['profile' => $post->user->id]) }}"
                       class="button button_colored button_shadowed">Профиль автора</a>
                </div>
            </article>
        </div>
    </section>
@endsection

@section('footer')
    @include('incs.footer')
@endsection