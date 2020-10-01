@extends('welcome')
@section('main-content')
{!! NoCaptcha::renderJs() !!}
    <div class="col-md-5 mt-md-5 ext-center conte">
        <div class="col-md-11 m-auto">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="ibox mt-md-1 ml-md-5 mr-md-5 widget-stat shadow badge-pill bg-primary">
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
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"  value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="address">Your Address <span class=" text-danger">*</span></label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Your Address">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="contact">Your Contact <span class=" text-danger">*</span></label>
                            <input type="tel" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" placeholder=" Your Contact No.">
                            @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="Email">Your Email <span class=" text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Your Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center mt-md-3 form-group">
                        <div class="col-md-12">
                            <label for="message">Message <span class=" text-danger">*</span></label>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="exampleFormControlTextarea1" rows="5"
                             placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
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
