<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'АртГалерея')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container py-4">
    <nav class="navbar navbar-expand-md bg-white shadow-sm rounded mb-4 px-3">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('paintings.index') }}">
            <span class="logo">🎨</span>
            <span class="site-name">АртГалерея</span>
        </a>
        <a class="btn btn-primary ms-auto" href="{{ route('paintings.create') }}">Добавить</a>
    </nav>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>