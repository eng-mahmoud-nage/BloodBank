<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>


    <!-- website font  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('/Front/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/Front/css/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/Front/css/style.css')}}"/>
    <title>Blood Bank</title>
</head>

<body>

<!-- Navbar 1 Start -->
<section id="Nav1">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        {{--        <div class="container">--}}
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <i class="fas fa-phone-volume" style="border-right: 1px solid gray;"> {{$setting->phone}}
                        &nbsp; &nbsp; </i>
                </li>
                <li class="nav-item">
                    <i class="far fa-envelope" style="padding-left: 15px;"> {{$setting->e_mail}} </i>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0 navbar-brand mx-auto">
            <a href="https://www.instagram.com/ipda3.tech/"><i
                    class="fab fa-instagram github">&nbsp;&nbsp;</i></a>
            <a href="https://www.facebook.com/ipda3tech/"><i
                    class="fab fa-facebook-f facebook">&nbsp;&nbsp;</i></a>
            <a href="https://twitter.com/ipda3_tech"><i class="fab fa-twitter twitter">&nbsp;&nbsp;</i></a>
            <a href="https://api.whatsapp.com/send?phone=+201097571186"><i
                    class="fab fa-whatsapp whats">&nbsp;&nbsp;</i></a>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                {{--                    <li class="nav-item">--}}
                {{--                        <a class="nav-link selected" style="border-right: 1px solid gray;" href="#">EN &nbsp;</a>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a class="nav-link" style="padding-left: 15px;" href="#">AR</a>--}}
                {{--                    </li>--}}

                @auth('client-web')
                    <li class="nav-item dropdown show" style="margin-left: 10px">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                            <i class="far fa-bell"></i>
                            <span
                                class="badge badge-warning navbar-badge">{{auth()->guard('client-web')->user()->notifications()->count()}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                            <span class="dropdown-item dropdown-header">{{auth()->guard('client-web')->user()->notifications()->count()}} Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> {{auth()->guard('client-web')->user()->notifications()->count()}}
                                new Notifications
                                <span class="float-right text-muted text-sm ">3 mins</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown show">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                            <span class="badge badge-warning navbar-badge"
                                  style="margin-top: 15px">{{auth()->guard('client-web')->user()->name}}</span>
                            <i class="fa fa-arrow-circle-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                            <span
                                class="dropdown-item dropdown-header">{{auth()->guard('client-web')->user()->name}}</span>
                            <div class="dropdown-divider"></div>
                            <a href="{{url('/profile')}}" class="dropdown-item">
                                <i class="fas fa-user-cog"
                                   style="color: black; margin-left: 5px; margin-right: 5px"></i> Profile
                            </a>
                            <a href="{{url('/change_password')}}" class="dropdown-item">
                                <i class="fas fa-user-edit"
                                   style="color: black; margin-left: 5px; margin-right: 5px"></i> Change Password
                            </a>
                            <a href="{{url('/client-logout')}}" class="dropdown-item">
                                <i class="fas fa-lock" style="color: black; margin-left: 5px; margin-right: 5px"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="{{asset('/storage/images/clients/mahmoud.jpg')}}" target="_blank"> <img
                                style="width: 50px; height: 50px; border-radius: 25%"
                                src="{{asset('/storage/images/clients/mahmoud.jpg')}}" alt="image"></a>
                    </li>
                @endauth
            </ul>
        </div>
        {{--        </div>--}}
    </nav>
</section>
<!-- Navbar 1 End -->

<!-- Navbar 2 Start -->
<section id="Nav2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{asset('/Front/imgs/logo.png')}}" width="18%"/>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link selected" href="{{url('/home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/about_us')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#articles">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/donation_requests')}}">Donations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/new_request')}}">New Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact_us')}}">Contact Us</a>
                </li>
                @auth('client-web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/notification_setting')}}">Notification Setting</a>
                    </li>
                @endauth
            </ul>
            @guest('client-web')
                <button class="btn signup" onclick="window.location.href = '{{url('/client-signup')}}';">New Account
                </button>
                <button class="btn login" onclick="window.location.href = '{{url('/client-login')}}';">Login</button>
            @endguest
        </div>
    </nav>
</section>
<!-- Navbar 2 End -->

<!-- Body Start -->

<section class="body">
    @yield('content')
</section>

<!-- Body End -->

<!-- Footer Start -->
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="foot-info">
                    <img src="{{asset('/Front/imgs/logo.png')}}" alt="">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos ut sit natus earum ea cum
                        doloremque fugit. Sit non ex suscipit fugiat molestias, ipsa rerum tempore voluptates
                        adipisci rem cum?</p>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="menu">
                    <a href="{{url('/home')}}">
                        <li>Home</li>
                    </a>
                    <a href="#app">
                        <li>About Us</li>
                    </a>
                    <a href="#articles">
                        <li>Articles</li>
                    </a>
                    <a href="#requests">
                        <li>Donations</li>
                    </a>
                    <a href="#header">
                        <li>Who We Are?</li>
                    </a>
                    <a href="#call-us">
                        <li>Contact Us</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="options">
                    <li>
                        <h5>Available On</h5>
                    </li>
                    <li><img src="{{asset('/Front/imgs/ios1.png')}}" alt=""></li>
                    <li><img src="{{asset('/Front/imgs/google1.png')}}" alt=""></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Footer End -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{asset('/Front/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="{{asset('/Front/js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Front/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Front/js/main.js')}}"></script>

@stack('scripts')
</body>

</html>
