@extends('welcome')
@section('main-content')

    <div class="col-md-5 mt-md-5 ext-center conte">
        <div class="col-md-11 m-auto">
            @if (Session::has('success'))
            <div class="bg-success text-white p-2">
                {{ Session::get('success') }}
            </div>
            @endif
        </div>
        <div class="ibox mt-md-1 ml-md-5 mr-md-5 widget-stat shadow badge-pill bg-primary" >
            <div class="ibox-body">
                <div class=" text-center font-bold mb-md-2" style="font-size: 30px">
                    Contact Us
                </div>
                <hr>
                <form action="{{ route('contactus.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="name">Your Name <span class=" text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required autofocus>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="address">Your Address <span class=" text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" placeholder="Your Address"
                                required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="contact">Your Contact <span class=" text-danger">*</span></label>
                            <input type="tel" name="contact" class="form-control" placeholder=" Your Contact No."
                                required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="Email">Your Email <span class=" text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="message">Message <span class=" text-danger">*</span></label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-3">
                            <input type="submit" class="form-control rounded-pill btn btn-info" value="Send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection