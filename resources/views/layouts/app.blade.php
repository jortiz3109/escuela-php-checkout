<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
</head>
<body>
    <div id="app">
        <main class="h-screen">
            @yield('content')
        </main>
        @stack('complements')
    </div>
</body>
</html>
