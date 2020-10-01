@extends('dashboard')
@include('sidemenu')
@section('title')
    Password Change
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class=" bg-danger text-white p-2">
                    {{ Session::get('error') }}
                </div> 
                @endif
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user_changepassword_update')}}">
                            @csrf
                           @isset($user_id)
                           <input type="text" name="user_id" id="user_id" value="{{$user_id}}" hidden>
                           @endisset
                            <div class="form-group row">
                                <label for="currentpassword" class="col-md-4 col-form-label text-md-right">{{ __('Your Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="currentpassword" type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="currentpassword" value="{{ old('currentpassword') }}" required autocomplete="currentpassword" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
