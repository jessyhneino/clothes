<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    @vite('resources/css/app.css')
    
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <title> @yield('title')</title>
    <link rel="stylesheet" href="{{ asset( 'css/style.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body> 

<!-- ------------------------------------------ section navbar-------------------------------------  -->

    <header class="head">
        <div class="both">
        
        <div class="logo-clothes">
            <a href="/home">
                <img class="nav-img" src="{{asset('images/logoClothes.png')}}" alt="logo_clothes">
            </a>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
        </div>
        <div class="nav-half">
            <div class="button-nav">
                <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark button-search " type="submit" onclick="performSearch()">Search</button>
            </div>
            <nav class="navigation">
                <div class="nav-link">
                    <!-- <a href="/services">Services</a>
                    <a href="/contact">Contact</a> -->
                </div>
                <div class="nav-btn">
                    @if(Auth::check())
                    <a class="logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    </a>
                    @else
                    <a class="login-btn" href="{{ route('login') }}">Login </a>
                    <a class="register-btn" href="/register">Rigester</a>
                    @endif
                </div>
            </nav>
        </div>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </header>

<!-- ------------------------------------------ end section navbar-------------------------------------  -->

    <div class="container-new ">
        @yield('content')
    </div>

    <!-- <footer class="footer">
        <p class="footer-title mt-2">Copyrights @ <span>Lavender</span></p>
        <div class="social-icons">
            <a href="https://www.facebook.com" class="social-icons fab fa-facebook-f ico me-2 mt-2 " target="_blank">
            </a>
            <a href="https://www.instagram.com" class="social-icons fab fa-instagram ico me-2 mt-2 social" target="_blank">
            </a>
            <a href="https://www.twitter.com" class="social-icons fab fa-twitter ico me-2 mt-2 " target="_blank">
            </a>
            <a href="https://www.youtube.com" class="social-icons fab fa-youtube ico me-2 mt-2 social" target="_blank">
            </a>
        </div>
    </footer> -->
<!-- ------------------------------------------ section footer-------------------------------------  -->
    <div class="footer">
        <footer>
            <div class="container-footer">
                <div class="wrapper">
                    <div class="footer-widget">
                        <a href="" class="footer-a">
                            <img src="{{asset('images/logolavend.jpg')}}" class="logo">
                        </a>
                        <p class="desc">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        </p>
                        <ul class="socials">
                                <li><a href="https://www.facebook.com"> <i class="social-icons fab fa-facebook-f ico me-2 mt-2 " target="_blank"></i></a></li>
                                <li><a href="https://www.twitter.com"> <i class="social-icons fab fa-twitter ico me-2 mt-2 " target="_blank"></i></a></li>
                                <li><a href="https://www.instagram.com"> <i class="social-icons fab fa-instagram ico me-2 mt-2 social" target="_blank"></i></a></li>
                                <li><a href="https://www.youtube.com"> <i class="social-icons fab fa-youtube ico me-2 mt-2 social" target="_blank"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-widget plus">
                        <h6>Quick Link</h6>
                        <ul class="links">
                            <li><a href="">Home</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Services</a></li>
                            <li><a href="">Products</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget plus">
                        <h6>Services </h6>
                        <ul class="links">
                            <li><a href="">web design </a></li>
                            <li><a href="">web development</a></li>
                            <li><a href="">seo optimization</a></li>
                            <li><a href="">blog writing </a></li>
                        </ul>
                    </div>
                    <div class="footer-widget plus">
                        <h6>Help &amp; Support </h6>
                        <ul class="links">
                            <li><a href="">support center</a></li>
                            <li><a href="">live chat</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">terms &amp; coditions</a></li>  
                        </ul>
                    </div>
                </div>
                <div class="copyright-wrapper">
                    <p class="copyright-p">   &copy;2025 . All rights reseved. designed by Jessy / Zeina / Maya / Jawa .</p> 
                </div>
            </div> 
        </footer>
    </div>


<!-- ------------------------------------------ end section footer-------------------------------------  -->


<!-- ************ -->

    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <!-- <script type="module"> 
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

//   const swiper = new Swiper(...)
</script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('java/main.js') }} " defer></script>
</body>
</html>