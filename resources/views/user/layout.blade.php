<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('header.css')}}">
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <link rel="stylesheet" href="{{ asset('footer.css')}}">
    <link rel="stylesheet" href="{{ asset('search.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    <header>
        @include('user.header')
    </header>

    <article>
        @yield('content')
    </article>

    <footer>
        @include('user.footer')
    </footer>
</body>
</html>