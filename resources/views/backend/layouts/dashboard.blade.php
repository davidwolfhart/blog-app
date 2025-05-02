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
    @include('backend.partials.css')
    @yield('css')
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Color Mode --}}
    @include('backend.partials.colormode')

    {{-- Header --}}
    @include('backend.partials.header')

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            @include('backend.partials.sidebar')

            {{-- Main --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('main')
            </main>
        </div>
    </div>

    {{-- Footer --}}
    @include('backend.partials.footer')

    {{-- JS --}}
    @include('backend.partials.js')
    @yield('js')
</body>

</html>
