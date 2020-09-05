<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            
            <nav class="navbar navbar-expand-md fixed-top navbar-dark  shadow-sm" style="background-color: #3a76a0;" >
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu text-white"></i></a>
                    </li>
                    
                </ul>
                <a class="navbar-brand" href="{{ url('/home') }}">
                   LCC
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                 @include('menu')
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav nav nav-pill ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user_changepassword') }}">
                                        Change Password
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                   
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </nav>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <ul class="side-menu metismenu">
                    <li>
                        <i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">.</span>
                        
                    </li>
                    <li class="heading">FEATURES</li>
                   @yield('sidemenu')
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
              @yield('content')
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">{{Date('yy')}} © <b>LCC</b> - All rights reserved.  Power By: <a href="https://mohrain.com/">Mohrain Websoft (P). Ltd.</a> </div>
               
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
   
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{asset('js/manifest.js')}}"></script>
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function() {

        fetch_customer_data();

        function fetch_customer_data(query = '') {
            $.ajax({
                url: "{{ route('live_search.action') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('datalist').html(data.table_data);
                }
            })
        }

        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>

</body>

</html>