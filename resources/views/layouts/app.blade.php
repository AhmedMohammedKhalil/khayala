<!doctype html>
<html lang="Ar" dir="rtl">
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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js"></script>

    @livewireStyles
    @stack('css')



    <title>khayala</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
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


        <div class="khayala-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse mean-menu w-auto" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-0 flex-row-reverse p-0">
                            <li class="nav-item"><a href="{{ route('search') }}" class="nav-link">??????</a></li>
                            <li class="nav-item"><a href="{{ route('competitons') }}" class="nav-link">??????????????????</a></li>
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">????????????????</a></li>

                            @if(!auth('doctor')->check() && !auth('trainer')->check() && !auth('admin')->check() && !auth('user')->check())
                                {{-- <li class="nav-item"><a href="#" class="nav-link">?????????? ???????? <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('doctor.register') }}" class="nav-link">??????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('trainer.register') }}" class="nav-link">????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('user.register') }}" class="nav-link">????????????????</a></li>

                                    </ul>
                                </li> --}}

                                <li class="nav-item"><a href="#" class="nav-link">?????????? ???????? <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link">????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('doctor.login') }}" class="nav-link">??????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('trainer.login') }}" class="nav-link">????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('user.login') }}" class="nav-link">????????????????</a></li>

                                    </ul>
                                </li>
                            @endif

                            @auth('admin')
                                <li class="nav-item text-center"><a href="#" class="nav-link">{{ Auth::guard('admin')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu ">
                                        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">???????? ????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('admin.logout') }}" class="nav-link">????????</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('doctor')
                                <li class="nav-item text-center"><a href="#" class="nav-link">{{ Auth::guard('doctor')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('doctor.profile') }}" class="nav-link">??????????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('doctor.logout') }}" class="nav-link">????????</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('trainer')
                                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::guard('trainer')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('trainer.profile') }}" class="nav-link">??????????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('trainer.logout') }}" class="nav-link">????????</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @auth('user')
                                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::guard('user')->user()->name }} <i class="icofont-simple-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="{{ route('user.profile') }}" class="nav-link">??????????????????</a></li>
                                        <li class="nav-item"><a href="{{ route('user.logout') }}" class="nav-link">????????</a></li>
                                    </ul>
                                </li>
                            @endauth


                        </ul>
                    </div>
                    <a class="navbar-brand" href="{{ route('home') }}"><img style="height: 80px;width:100px" src="{{ asset('img/logo.png') }}" alt="logo"></a>

                </nav>
            </div>
        </div>
        <div class="khayala-mobile-nav" style="height: 90px">
            <div class="logo" style="position: absolute;width:auto">
                <a href="{{ route('home') }}"><img style="height: 80px;width:100px" src="{{  asset('img/logo.png')  }}" alt="logo"></a>
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
                        <p class="text-center"><i class="icofont-copyright"></i> ???????? ???????????? ???????????? @ <span dir="ltr">   2022 - KHAYALA </span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <div class="go-top" style="left: 15px; right:unset"><i class="icofont-swoosh-up"></i><i class="icofont-swoosh-up"></i></div>


    <!-- jQuery Min JS -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>

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
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <!-- WOW Min JS -->
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <!-- ajaxChimp Min JS -->
    <script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <!-- counter Min JS -->
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

        <!-- Main JS -->
    <script src="{{ asset('js/main.js')}}"></script>

    @livewireScripts
    @stack('js')

</body>

</html>
