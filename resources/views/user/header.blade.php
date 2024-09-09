<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('header.css') }}">
    <title>Header</title>
</head>

<body>
    <div class="container">
        <div class="preview-header">
            <div class="header-logo">
                <a href="#" class="hd-logo"><strong>envato</strong> market</a>
            </div>
            <div class="preview-buy">
                <a href="#" class="hd-buy">Buy now</a>
            </div>
        </div>

        <div class="header-top-bar">
            <div class="row">
                <div class="menu-primary">
                    <ul class="main-menu-top">
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Special Offer
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Infor!!
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="social">
                    <span>Share Us</span>
                    <ul class="social-icon">
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-vk"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-telegram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-behance"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-menu">
            <div class="logo-link">
                <img src="{{ url('storage\images\yPHxKSj4uKOVEedpO6PLqaKMGjFoUxYLsvEh0aKI.png') }}" alt="">
            </div>

            <div class="search-header">
                <div class="mode">
                    <div class="night-mode">
                        <span class="moon">
                            <i class="fa-regular fa-moon"></i>
                        </span>
                    </div>

                    <div class="night-mode">
                        <span class="moon">
                            <i class="fa-regular fa-moon"></i>
                        </span>
                    </div>

                    <div class="day-mode">
                        <span class="sun">
                            <i class="fa-regular fa-sun"></i>
                        </span>
                    </div>
                </div>

                <div class="act-cart">
                    <span class="cart">
                        <i class="fa-thin fa-bag-shopping"></i>
                    </span>
                </div>

                <div class="act-search">
                    <span class="search">
                        <i class="fa-thin fa-magnifying-glass"></i>
                    </span>
                </div>

                <div class="act-bars">
                    <span class="bars">
                        <i class="fa-thin fa-magnifying-glass"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
