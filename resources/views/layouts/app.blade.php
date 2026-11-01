<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'АртГалерея')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <nav class="navbar bg-white shadow-sm rounded mb-4 px-3">
        <a class="navbar-brand" href="{{ route('paintings.index') }}">🎨 АртГалерея</a>
        <a class="btn btn-primary" href="{{ route('paintings.create') }}">Добавить</a>
    </nav>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>