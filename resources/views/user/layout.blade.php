<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('header.css') }}">
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <link rel="stylesheet" href="{{ asset('footer.css') }}">
    <link rel="stylesheet" href="{{ asset('search.css') }}">
    <title>@yield('title')</title>

    <style>
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;

        }

        article {
            margin: 50px;
        }


        @media (max-width: 1200px) {
            body{
                max-width: 100vw; /* Đảm bảo không vượt quá chiều rộng của viewport */

            }
            article {
                margin: 40px;

            }

        }

        @media (max-width: 992px) {
            body{
                max-width: 100vw; /* Đảm bảo không vượt quá chiều rộng của viewport */

            }
            article {
                margin: 30px;
            }

        }

        @media (max-width: 768px) {
            article {
                margin: 20px;
            }

        }

        @media (max-width: 576px) {
            article {
                margin: 15px;
            }

        }
    </style>
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
