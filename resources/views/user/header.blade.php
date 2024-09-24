<link rel="stylesheet" href="{{ asset('header.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<div class="container">
    <div class="header">
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
                        <li class="nav-bar-btn">
                            <a href="#">
                                <i class="fa-brands fa-behance"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-menu">
            <div class="menu-main">
                <div class="logo-link">
                    <img src="{{ url('storage\images\logo.png') }}" alt="">
                </div>

                <div class="menu-link">
                    <div class="nav-pc">
                        {{-- na-pc --}}
                        <ul>
                            <li>
                                <a href="{{ route('homePage') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">Features
                                    {{-- <span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </span> --}}
                                </a>

                                {{-- <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    Post Layout
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Post Format
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Author Page
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Category Page
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Page 404
                                </a>
                            </li>
                        </ul> --}}
                            </li>
                            <li>
                                <a href="#">Inspiration</a>
                                {{-- <span>
                                <i class="fa-solid fa-angle-down"></i>
                            </span> --}}
                            </li>
                            <li>
                                <a href="#">Active</a>
                            </li>
                            <li>
                                <a href="#">Business</a>
                            </li>
                            <li>
                                <a href="#">Shop</a>
                                {{-- <span>
                                <i class="fa-solid fa-angle-down"></i>
                            </span> --}}
                            </li>
                        </ul>
                    </div>

                    <div class="nav-overlay">
                        
                    </div>
                </div>

                <div class="search-header">
                    <div class="icon-media">
                    <div class="mode">
                        {{-- <div class="night-mode">
                        <span class="moon">
                            <i class="fa-regular fa-moon"></i>
                        </span>
                    </div> --}}

                        <div class="day-mode">
                            <span class="sun">
                                <i class="fa-regular fa-sun"></i>
                            </span>
                        </div>
                    </div>

                    <div class="act-cart">
                        <span class="cart">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </span>
                    </div>

                    <div class="act-search">
                        <form action="{{ route('search-form') }}" id="form-search" method="POST">
                            {{ csrf_field() }}
                            <input type="text" id="search-text" name="keyword" placeholder="Bạn muốn tìm kiếm gì?"
                                required>
                            <button type="submit" id="search-btn" name="search-btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                    </div>
                    <label for="nav-mb-input" class="act-bars">
                        <span class="bars">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </label>

                    <input type="checkbox" hidden class="nav-input" id="nav-mb-input">

                    <label  for="nav-mb-input"  class="nav-overlay">    
                    </label>

                    <div class="menu-link-mb">
                        <div class="nav-mb">
                            {{-- nav-mb --}}
                            <label for="nav-mb-input">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </label>
            
                            <div class="act-search">
                                <form action="{{ route('search-form') }}" id="form-search" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" id="search-btn" name="search-btn">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>

                                    <input type="text" id="search-text" name="keyword" placeholder="Bạn muốn tìm kiếm gì?"
                                        required>
                                </form>
                            </div>
            
                            <ul>
                                <li>
                                    <a href="{{ route('homePage') }}" class="link-mobile">Home</a>
                                </li>
                                <li>
                                    <a href="#" class="link-mobile">Features</a>
                                </li>
                                <li>
                                    <a href="#" class="link-mobile">Inspiration</a>
                                </li>
                                <li>
                                    <a href="#" class="link-mobile">Active</a>
                                </li>
                                <li>
                                    <a href="#" class="link-mobile">Business</a>
                                </li>
                                <li>
                                    <a href="#" class="link-mobile">Shop</a>
                                </li>
                            </ul>
                        </div>
                
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>
