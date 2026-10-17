<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Вход в Админ-панель</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin.css') }}">
</head>
<body class="admin">

<main class="admin-main">
    <div class="admin-container">
        <form method="POST" action="{{ route('admin.login.post') }}" class="admin-form admin-form--login">
            @csrf

            <h1 class="admin-title">Вход в Админ-панель</h1>

            <div class="admin-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <div class="admin-field">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
                @error('password') <div class="admin-error">{{ $message }}</div> @enderror
            </div>

            <div class="admin-field remember-me admin-field--inline">
                <label><input type="checkbox" name="remember" value="1"> Запомнить меня</label>
            </div>

            <div class="admin-form__actions">
                <button type="submit" class="admin-btn admin-btn--primary">Войти</button>
            </div>
        </form>
    </div>
</main>

</body>
</html>