<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админ-панель')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin.css') }}">
</head>

<body class="admin">

    <header class="admin-header">
        <div class="admin-container admin-header__inner">
            <a href="{{ route('admin.main.index') }}" class="admin-brand">🔧 AvtoCheckVlg · Админ-панель</a>
            <nav class="admin-nav">
                <a href="{{ route('admin.main.index') }}" class="@if(request()->routeIs('admin.main.index')) is-active @endif">Главная</a>
                <a href="{{ route('admin.service.index') }}" class="@if(request()->routeIs('admin.service.*')) is-active @endif">Услуги</a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}" class="admin-logout">
                @csrf
                <button type="submit" class="admin-nav__logout">Выйти</button>
            </form>
        </div>
    </header>

    <main class="admin-main">
        <div class="admin-container">
            @if(session('status'))
            <div class="admin-alert admin-alert--success">{{ session('status') }}</div>
            @endif

            @yield('content')
        </div>
    </main>

</body>

</html>