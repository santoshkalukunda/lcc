@extends('layouts.app')
@section('title')
    Add Commpany
@endsection
@section('content')
  
<div class="col-md-8">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Register Company</div>

            <div class="card-body">
                <form action="{{ route('company.store') }}" method="post" class="form-group">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-3">
                           
                            <label for="company-name" class="">Company Name :</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="company-name" name="name" required placeholder="Comapany Name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="reg_no">Reg. No:</label>
                        </div>
                        <div class="col-md-8">
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

                        <div class="col-md-3">
                            <label for="nepali-datepicker">Reg. Date:</label>
                        </div>
                        <div class="col-md-8">
                           
                            <input type="text" id="nepali-datepicker" value="{{ old('reg_date') }}" name="reg_date" required
                                placeholder="Reg. Date YYYY-MMM-DD" class="form-control @error('reg_date')is-invalid @enderror">
                            @error('reg_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="fiscal_year">Reg. Fiscal Year:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="fiscal_year" value="{{ old('fiscal_year') }}" name="fiscal_year"
                                value="{{ date('yyyy') }}" required placeholder="Reg. Fiscal Year (YYYY)"
                                class="form-control @error('fiscal_year') is-invalid @enderror">
                            @error('fiscal_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="category">Category:</label>
                        </div>
                        <div class="col-md-8">
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
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="address">Address:</label>
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
                        <div class="col-md-3">
                            <label for="contact_no">Office Contact No.:</label>
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
                        <div class="col-md-3">
                            <label for="share">Total Share:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" value="{{ old('share') }}" name="share" id="share" required
                                placeholder="Total Share" class="form-control @error('share')is-invalid @enderror">
                            @error('share')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <input class="btn btn-success badge-pill ml-5" type="submit">
                        <input class="btn btn-danger badge-pill ml-3" type="reset">
                    </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
