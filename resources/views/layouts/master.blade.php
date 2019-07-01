<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- csrf-token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('style')

    <title>Portfolio</title>
</head>
<body>
    <div id="app">
        @include('layouts.partial.nav')

        <div class="container">
            @yield('content')
        </div>

        @include('layouts.partial.footer')
    </div>
    
    {{-- script --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>