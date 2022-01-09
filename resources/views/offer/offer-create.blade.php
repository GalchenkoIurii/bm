@extends('layouts.main')

@section('page-title')Ответить на заявку@endsection

@section('header')
    @include('incs.header')
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="page-header">Ответить на заявку</h1>
            <div class="card">
                <form action="{{ route('applications.offer.store', ['application' => $id]) }}" method="post" class="form"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card__form-group">
                        <label for="comment" class="card__form-group-label">Вы можете оставить комментарий к Вашему предложению (не обязательно)</label>
                        <div class="card__form-group-input">
                            <textarea name="comment" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="card__form-group">
                        <div class="btn-container">
                            <button type="submit" class="button button_colored button_shadowed">Подтвердить</button>
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