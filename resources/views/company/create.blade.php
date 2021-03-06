@extends('dashboard')
@include('sidemenu')
@section('title')
    Add Commpany
@endsection
@section('content')
<div class="row">
<div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Company Registration Form</div>

            <div class="card-body">
                <form action="{{ route('company.store') }}" method="post" class="form-group">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                           
                            <label for="company-name" class="">Company Name <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="company-name" name="name" required placeholder="Comapany Name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="address">Address <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="address" value="{{ old('address') }}" name="address" required
                                placeholder="Address" class="form-control @error('address')is-invalid @enderror">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="contact_no">Contact No. <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="tel" value="{{ old('contact_no') }}" name="contact_no" id="contact_no" required
                                placeholder="Office Contact No."
                                class="form-control @error('contact_no')is-invalid @enderror">
                            @error('contact_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="email">Email <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" value="{{ old('email') }}" name="email" id="email" required
                                placeholder="Email"
                                class="form-control @error('email')is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="category">Category <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-3">
                            <select type="text" id="category" value="{{ old('category') }}" name="category"
                                class="form-control @error('category') is-invalid @enderror">
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <option value="private">Private</option>
                            <option value="public">Public</option>
                            <option value="non-profitable">Non-Profitable</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="reg_no">Reg. No <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="reg_no" value="{{ old('reg_no') }}" required name="reg_no"
                                placeholder="Reg. no" class="form-control @error('reg_no')is-invalid @enderror">
                            @error('reg_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                 
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="nepali-datepicker">Reg. Date <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="nepali-datepicker" value="{{ old('reg_date') }}" name="reg_date" required
                                placeholder="Reg. Date YYYY-MMM-DD" class="form-control @error('reg_date')is-invalid @enderror">
                            @error('reg_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="fiscal_year">Reg. Fiscal Year <span class=" color-red">*</span></label>
                        </div>
                        <div class="col-md-3">
                            <select name="fiscal_year" id="fiscal_year" value="{{ old('fiscal_year') }}" class="form-control @error('fiscal_year') is-invalid @enderror" required>
                                <option value="">Select Fiscal Year</option>
                                @for ( $i =98; $i >10; $i--)
                                @php
                                   $j=$i;
                                @endphp
                                <option>20{{$i}}/0{{++$j}}</option>
                                    @endfor
                            </select>
                            @error('fiscal_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        



                    </div>
                   
                   
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="pan_no">PAN/VAT No. </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="{{ old('pan_no') }}" name="pan_no" id="pan_no" 
                                placeholder="PANNo. / VAT No."
                                class="form-control @error('pan_no')is-invalid @enderror">
                            @error('pan_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="user_name">User Name:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="{{ old('user_name') }}" name="user_name" id="user_name" 
                                placeholder="User Name"
                                class="form-control @error('user_name')is-invalid @enderror">
                            @error('user_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"> </div>
                        <input class=" col-md-2 form-control btn btn-success  rounded-pill mr-md-2 ml-md-3 mt-2" type="submit">
                        <input class=" col-md-2 form-control btn btn-danger rounded-pill mt-2" type="reset">
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
