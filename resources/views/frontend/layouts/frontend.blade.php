<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ config('app.description') }}">
    <meta name="author" content="{{ config('app.author') }}">
    <meta name="generator" content="{{ config('app.generator') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    {{-- CSS --}}
    @include('frontend.partials.css')
    @yield('css')
</head>

<body class="d-flex flex-column min-vh-100">

    @include('backend.partials.colormode')

    {{-- Navbar --}}
    @include('frontend.partials.navbar')

    {{-- Alert --}}
    @include('frontend.partials.alert')

    <div class="container mt-3 mb-3">
        {{-- Main --}}
        @yield('main')
    </div>

    {{-- Footer --}}
    @include('frontend.partials.footer')

    {{-- JS --}}
    @include('frontend.partials.js')
    @yield('js')
</body>

</html>
