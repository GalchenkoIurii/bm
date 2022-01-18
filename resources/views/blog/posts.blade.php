@extends('layouts.main')

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
            {{--{{ Breadcrumbs::render('') }}--}}
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
                                    <span class="card__item-content">{{ \Illuminate\Support\Str::words($post->title, 10, ' ...') }}</span>
                                </p>
                                <p class="card__item">
                                    <span class="card__item-title">{{ \Illuminate\Support\Str::words($post->description, 20, ' ...') }}</span>
                                </p>

                                <p class="card__item card__item_centered">
                                    <span class="card__item-label"><i class="fas fa-calendar-alt"></i></span>
                                    <span class="card__item-text">
                                            {{ date('d.m.Y', strtotime($post->created_at)) }}
                                    </span>
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