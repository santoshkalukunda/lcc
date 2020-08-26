@extends('layouts.app')
@section('title')
    Edit Commpany
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-company-sidebar :id="$companyInfo->id"></x-company-sidebar>
            </div>
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('success'))
                        <div class="bg-success text-white p-2">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-header">Edit Company</div>

                    <div class="card-body">
                        <form action="{{ route('company.update', $companyInfo->id) }}" method="post" class="form-group">
                            @method('put')
                            @csrf
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="company-name" class="">Company Name :</label>
                                </div>

                                <div class="col-8">

                                    <input value="{{ $companyInfo->name }}" type="text" id="company-name" name="name"
                                        required placeholder="Comapany Name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
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
                                    <input type="text" value="{{ $companyInfo->reg_no }}" id="reg_no"
                                        value="{{ old('reg_no') }}" required name="reg_no" placeholder="Reg. no"
                                        class="form-control @error('reg_no')is-invalid @enderror">
                                    @error('reg_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">

                                <div class="col-3">
                                    <label for="nepali-datepicker">Reg. Date:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="nepali-datepicker"  name="reg_date"  value="{{ $companyInfo->reg_date }}"required
                                placeholder="Reg. Date YYYY-MMM-DD" class="form-control @error('reg_date')is-invalid @enderror">
                                    @error('reg_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="fiscal_year">Reg. Fiscal Year:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" value="{{ $companyInfo->fiscal_year }}" id="fiscal_year"
                                        value="{{ old('fiscal_year') }}" name="fiscal_year" value="{{ date('yyyy') }}"
                                        required placeholder="Reg. Fiscal Year (YYYY)"
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
                                    <select id="category" value="{{ $companyInfo->category }}" name="category"
                                        class="form-control @error('category') is-invalid @enderror">
                                        @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        @if ($companyInfo->category == 'private')
                                            <option value="private" selected>Private</option>
                                            <option value="public">Public</option>
                                            <option value="non-profitable">Non-Profitable</option>
                                        @endif
                                        @if ($companyInfo->category == 'public')
                                            <option value="public" selected>public</option>
                                            <option value="private">Private</option>
                                            <option value="non-profitable">Non-Profitable</option>
                                        @endif
                                        @if ($companyInfo->category == 'non-profitable')
                                            <option value="non-profitable" selected>Non-Profitable</option>
                                            <option value="private">Private</option>
                                            <option value="public">Public</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="address">Address:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" value="{{ $companyInfo->address }}" id="address"
                                        value="{{ old('address') }}" name="address" required placeholder="Address"
                                        class="form-control @error('address')is-invalid @enderror">
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
                                    <input type="tel" value="{{ $companyInfo->contact_no }}" value="{{ old('contact_no') }}"
                                        name="contact_no" id="contact_no" required placeholder="Office Contact No."
                                        class="form-control @error('contact_no')is-invalid @enderror">
                                    @error('contact_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="share">Total Share:</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" value="{{ $companyInfo->share }}" name="share" id="share" required
                                        placeholder="Total Share" class="form-control @error('share')is-invalid @enderror">
                                    @error('share')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-2"><input class="btn btn-success badge-pill" type="submit" value="Update">
                                </div>
                                <div class="col-2"><button class="btn btn-info badge-pill"><a
                                            href="{{ route('company.show', $companyInfo->id) }}"
                                            class="text-decoration-none text-white">Cancel</a></button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection
