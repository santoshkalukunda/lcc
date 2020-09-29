<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LCC</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-image: url("{{ asset('background2.jpg') }}");
            background-repeat: no-repeat;
            height: 650px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #3a76a0;">
        <a class=" navbar-brand nav-link btn btn-outline-info  rounded-pill text-white" href="{{ '/' }}">LCC</a>
            <ul class="navbar-nav nav nav-pill ml-auto">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                        <li class=" nav-item">
                            <a href="{{ url('/home') }}"
                            class=" btn btn-outline-info  rounded-pill text-white">Application</a>
                        </li>
                            
                        @else
                        <li class=" nav-item"> 
                            <a href="{{ route('login') }}" class=" btn btn-outline-info rounded-pill text-white">Login</a>
                        </li>
                        @endauth
                    </div>
                @endif
            </ul>
        
    </nav>
    <div class="row justify-content-center m-auto  text-white">
        @isset($profile)
            <div class="col-lg-12 my-4">
                <div class=" row-cols-md-1 font-bold text-center">
                <img src="{{asset('storage/'.$profile->logo)}}" class=" img-circle img-fluid img-thumbnail" alt="Lcc logo" style=" height:150px;">
                </div>
                <div class=" row-cols-md-1 font-bold text-center">
                    <h2 class=" font-weight-bold">{{ $profile->name }}</h2>
                </div>
                <div class="  row-cols-sm-1 text-md-center font-bold">
                    <h4 class=" font-weight-bold">{{ $profile->address }}</h4>
                </div>
                <div class=" row-cols-md-1 ro text-md-center font-bold">
                    <h4 class=" font-weight-bold">{{ $profile->contact }}</h4>
                </div>
                <div class=" row-cols-md-1 text-md-center font-bold">
                    <h4 class=" font-weight-bold">{{ $profile->email }}</h4>
                </div>
                <div class=" row my-3 m-auto font-bold justify-content-center">
                    <a href="{{ url('downloads') }}"
                class=" nav-link btn btn-outline-info  rounded-pill text-white col-md-1 mx-2">Downloads</a>
                <a href="{{ url('contact-us') }}"
                class=" nav-link btn btn-outline-info  rounded-pill text-white col-md-1  mx-2">Contact-us</a>
                </div>
               
            </div>
            
        @endisset

    @yield('main-content')
        
    </div>
    <footer class="fixed-bottom justify-content-center bg-light">
        <div class="font-13 text-center">{{ Date('yy') }} © <b>LCC</b> - All rights reserved. Powered by: <a
                href="https://mohrain.com/">Mohrain Websoft (P). Ltd.</a> </div>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</body>
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>
