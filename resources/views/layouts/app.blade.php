<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Khayala') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!-- IcoFont Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">
    <!-- Odometer Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/odometer.min.css') }}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css') }}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <livewire:styles />

    @stack('css')

    <title>khayala</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
</head>

<body>
    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="loader">
            <img src="{{ asset('img/preloader.gif') }}" alt="preloader">

            <h2>Loading...</h2>
        </div>
    </div>
    <!-- End Preloader Area -->
    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="khayala-mobile-nav">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>
            </div>
        </div>

        <div class="khayala-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="{{ route('competitons') }}" class="nav-link">Competition</a></li>
                            <li class="nav-item"><a href="{{ route('search') }}" class="nav-link">Search</a></li>

                            @if(!auth('doctor')->check() && !auth('trainer')->check() && !auth('admin')->check() && !auth('user')->check())
                                <li class="nav-item"><a href="#" class="nav-link">Register <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('doctor.register') }}" class="nav-link">Doctor</a></li>
                                        <li class="nav-item"><a href="{{ route('trainer.register') }}" class="nav-link">Trainer</a></li>
                                        <li class="nav-item"><a href="{{ route('user.register') }}" class="nav-link">User</a></li>

                                    </ul>
                                </li>

                                <li class="nav-item"><a href="#" class="nav-link">Login <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link">Admin</a></li>
                                        <li class="nav-item"><a href="{{ route('doctor.login') }}" class="nav-link">Doctor</a></li>
                                        <li class="nav-item"><a href="{{ route('trainer.login') }}" class="nav-link">Trainer</a></li>
                                        <li class="nav-item"><a href="{{ route('user.login') }}" class="nav-link">User</a></li>

                                    </ul>
                                </li>
                            @endif
                            
                            @auth('admin')
                                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::guard('admin')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
                                        <li class="nav-item"><a href="{{ route('admin.logout') }}" class="nav-link">logout</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('doctor')
                                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::guard('doctor')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('doctor.profile') }}" class="nav-link">Profile</a></li>
                                        <li class="nav-item"><a href="{{ route('doctor.logout') }}" class="nav-link">logout</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('trainer')
                                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::guard('trainer')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('trainer.profile') }}" class="nav-link">Profile</a></li>
                                        <li class="nav-item"><a href="{{ route('trainer.logout') }}" class="nav-link">logout</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('user')
                                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::guard('user')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('user.profile') }}" class="nav-link">Profile</a></li>
                                        <li class="nav-item"><a href="{{ route('user.logout') }}" class="nav-link">logout</a></li>
                                    </ul>
                                </li>
                            @endauth

                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->



    @yield('content')


     <!-- Start Footer Area -->
     <footer class="footer-area" style="padding-top: 0">
        <div class="copyright-area" style="margin-top: 0">
            <div class="container">
                <div class="row align-items-center">
                    <div>
                        <p class="text-center"><i class="icofont-copyright"></i> Copyright 2022 khayala. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <div class="go-top"><i class="icofont-swoosh-up"></i><i class="icofont-swoosh-up"></i></div>

    <!-- jQuery Min JS -->
    <script src="{{ asset('js/jquery.min.js')}}"></script></script>
    <!-- Popper Min JS -->
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap Min JS -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- MeanMenu JS -->
    <script src="{{ asset('js/jquery.meanmenu.js')}}"></script>
    <!-- Appear Min JS -->
    <script src="{{ asset('js/jquery.appear.min.js')}}"></script>
    <!-- Parallax min JS -->
    <script src="{{ asset('js/parallax.min.js')}}"></script>
    <!-- Odometer Min JS -->
    <script src="{{ asset('js/odometer.min.js')}}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <!-- WOW Min JS -->
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{ asset('js/form-validator.min.js')}}"></script>
    <!-- Contact Form Min JS -->
    <script src="{{ asset('js/contact-form-script.js')}}"></script>
    <!-- ajaxChimp Min JS -->
    <script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js')}}"></script>
    <livewire:scripts />
    @stack('js')

</body>

</html>
