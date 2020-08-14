@extends('layouts.app')
@section('title')
 Dashboard |{{$companyInfo->name}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <x-company-sidebar :id="$companyInfo->id"></x-company-sidebar>
            </div>
            <div class="col-8">
                    <div class="card info">
                    <div class="card-header">About</div>
                        <div class="card-body">
                        <form action="#" method="post" class="form-group">
                            @method('put')
                            @csrf
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="company-name" class="">Company Name :</label>
                                </div>
                                
                                <div class="col-8">
                                   
                                    <input value="{{$companyInfo->name}}" type="text" id="company-name" name="name" required placeholder="Comapany Name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" disabled >
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="reg_no">Reg. No:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" value="{{$companyInfo->reg_no}}" id="reg_no" value="{{ old('reg_no') }}" required name="reg_no" placeholder="Reg. no"
                                        class="form-control @error('reg_no')is-invalid @enderror" disabled>
                                    @error('reg_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                    </div>
                    <div class="row form-group">
        
                        <div class="col-3">
                            <label for="reg_date">Reg. Date:</label>
                        </div>
                        <div class="col-8">
                            <input type="date" value="{{$companyInfo->reg_date}}" id="reg_date" value="{{ old('reg_date') }}" name="reg_date" required placeholder="Reg. Date"
                                class="form-control @error('reg_date')is-invalid @enderror" disabled>
                            @error('reg_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="fiscal_year" >Reg. Fiscal Year:</label>
                        </div>
                        <div class="col-8">
                            <input type="number" value="{{$companyInfo->fiscal_year}}" id="fiscal_year" value="{{ old('fiscal_year') }}"
                        name="fiscal_year" value="{{date('yyyy')}}"  required placeholder="Reg. Fiscal Year" class="form-control @error('fiscal_year') is-invalid @enderror" disabled>
                            @error('fiscal_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="address" >Address:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" value="{{$companyInfo->address}}" id="address" value="{{ old('address') }}" name="address"
                                required placeholder="Address" class="form-control @error('address')is-invalid @enderror" disabled>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="contact_no">Office Contact No.:</label>
                        </div>
                        <div class="col-8">
                            <input type="tel" value="{{$companyInfo->contact_no}}" value="{{ old('contact_no') }}"
                                name="contact_no" id="contact_no" required placeholder="Office Contact No." class="form-control @error('contact_no')is-invalid @enderror" disabled>
                            @error('contact_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-2"><button class="btn btn-primary" type="button"><i class="fa fa-edit"><a href="{{ route('company.edit', $companyInfo->id) }}" class="text-decoration-none text-white"> Edit</a></i></button></div>
                    </div>
                    </form>

                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
