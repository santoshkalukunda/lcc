<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LCC</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-image: url("{{ asset('background.jpg') }}");
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
        <a class="navbar-brand font-24 font-bold text-white" href="{{ '/' }}">LCC</a>
        <ul class="navbar-nav nav nav-pill ml-auto">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-outline-info  badge-pill text-white">Application</a>
                    @else
                        <a href="{{ route('login') }}" class=" btn btn-outline-info badge-pill text-white">Login</a>
                    @endauth
                </div>
            @endif
        </ul>
    </nav>
    <div class="row">
        <div class="col-md-6">
            <div class="font-bold ml-5 justify-content-center" style="font-size: 40px;  margin-top: 25px;">
                Welcome To LCC
            </div>
            <div class=" text-md-left font-bold ml-5" style="font-size: 30px">
                Dhangadhi, Kailali, Nepal
            </div>
            <div class=" text-md-left font-bold ml-5" style="font-size: 30px">
                091-520000
            </div>
            <div class=" text-md-left font-bold ml-5" style="font-size: 30px">
                <a href="mailto:info@lcc.com.np" class=" text-dark">info@lcc.com.np</a>
            </div>
        </div>
        <div class="col-md-6 pl-lg-5">
            <div class=" text-center font-bold  mt-3 " style="font-size: 30px">
                <u>Contact Us</u>
            </div>
            <div class="ibox mt-md-3 ml-md-5 mr-md-5 widget-stat shadow badge-pill" style="opacity: 0.97">
                <div class="ibox-body">
                    <form action="{{ route('contactus.store') }}" method="post">
                        @csrf
                        <div class="row justify-content-center mt-md-3 form-group">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-md-3 form-group">
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control" placeholder="Your Address"
                                    required>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-md-3 form-group">
                            <div class="col-md-12">
                                <input type="tel" name="contact" class="form-control" placeholder=" Your Contact No."
                                    required>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-md-3 form-group">
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>
                        </div>
                    
                        <div class="row justify-content-center mt-md-3 form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-md-3 form-group">
                            <div class="col-md-4">
                                <input type="submit" class="form-control badge-pill btn btn-info" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
    <footer class="fixed-bottom justify-content-center bg-light">
        <div class="font-13 text-center">{{Date('yy')}} © <b>LCC</b> - All rights reserved.  Powered by: <a href="https://mohrain.com/">Mohrain Websoft (P). Ltd.</a> </div>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</body>
<script src="{{asset('js/manifest.js')}}"></script>
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
</html>
