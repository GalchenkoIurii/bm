<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">

    <title>@yield('page-title')</title>

</head>
<body>

@yield('header')

<main class="main">
    @yield('content')
</main>

@include('incs.success_modal')

@yield('footer')

<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>