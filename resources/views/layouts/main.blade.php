<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Технический осмотр легкового транспорта')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/styles.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

</body>

</html>