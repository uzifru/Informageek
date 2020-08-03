<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Forgif is a GIF sharing site, on this site you can find various GIF animations that other people and your friends are sharing. Just start by signing up for free and start sharing your GIF.">
    <meta name="keyword" content="Forgif, GIF sharing site, free GIF, social networking, social media, funnies GIF">
    @yield('og')
    <link rel="shortcut icon" href="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') &mdash; {{ config('app.name', 'Informageek') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/apphome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('scripts/bootstrap-tour/build/css/bootstrap-tour.min.css') }}">
    @yield('css')
</head>
<body>
    <div id="app">
    @if(@$navbar !== false)
        <nav class="navbar navbar-default navbar-static-top {{Auth::check()  ? 'has-topbar' : ''}}">
           
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="navbar-brand">
                        <a class="logo" href="{{ url('/') }}">INFORMAGEEK<span>.</span></a>
                        <div class="global-loader">                    
                            <img src="{{url('media/loader.gif')}}">
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <form class="navbar-form navbar-left" action="#">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Search" required="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="ion-search"></i></button>                        
                                </div>                                
                            </div>
                        </div>
                    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
{{--                             <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ion-ios-bell"></i>
                                </a>
                                <div class="dropdown-menu notif">
                                    <h4 class="title-block">Notifications</h4>
                                    <ul>
                                       <li>
                                           <a href="">
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <figure>
                                                           <img src="{!!avatar(Auth::user()->picture) !!}">
                                                       </figure>                                                       
                                                   </div>
                                                   <div class="col-md-10">
                                                       <div class="name">Tamvan</div>
                                                       <div class="text">lorem ipsum dolor sit amet, dolor amet si contrequer as sikka sda</div>
                                                       <div class="time">20 Minutes ago</div>
                                                   </div>
                                               </div>
                                           </a>
                                       </li> 
                                    </ul>
                                </div>
                            </li>
 --}}                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ion-person-stalker"></i> <span class="text">Forgif Request</span>
                                </a>
                                <div class="dropdown-menu user-menu">
                                    <h4 class="title-block">Forgif Request</h4>
                                    
                        
                                    <p class="text-center"><i>You have no forgif request</i></p>
                                    
                                </div>
                            </li>
                            <li>
                                <a href="{{route('user.detail', Auth::user()->username)}}">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="avatar">
                                        <img src="">
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-gear-b"></i> <span class="text">Options</span></a>
                                <div class="dropdown-menu user-options" role="menu">
                                    <h4 class="title-block">Options</h4>
                                    <ul>
                                        <li><a href="#"><i class="ion ion-person"></i> Find Friends</a></li>
                                       
                                        <li><a href="#"><i class="ion ion-alert-circled"></i> Reports</a></li>
                                       
                                        <li><a href="#"><i class="ion ion-document"></i> Pages</a></li>
                                       
                                        <li><a href="#"><i class="ion ion-help"></i> Help Center</a></li>
                                        <li><a href="#"><i class="ion ion-gear-a"></i> Settings</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <i class="ion ion-log-out"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                @if(Auth::check())
                <div class="right-on-mobile">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="ion-person"></i></a></li>
                    </ul>
                </div>
                @endif
            </div>
        </nav>
    @endif

        @yield('content')

        @if(@$footer !== false)
        <footer class="footer main-footer">
            <div class="copyright">            
                Copyright &copy; {{date('Y')}} {{config('app.name')}}. All Right Reserved.
            </div>
            <ul class="footer-nav">
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </footer>
        @endif
    </div>

    <!-- Scripts -->
    <script>var base_url = '{{url('/')}}', appver = '{{Auth::check() ? md5(Auth::user()->id) : md5(request()->ip)}}';</script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('scripts/autosize/dist/autosize.min.js') }}"></script>
    <script src="{{ asset('scripts/sticky.js') }}"></script>
    <script src="{{ asset('scripts/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('scripts/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('js')
</body>
</html>
