@extends('dashboard')
@section('title')
    Sharehoder Register
@endsection
@section('content')
    <x-company-sidebar :id="$companyInfo->id"></x-company-sidebar>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('success'))
                        <div class="bg-success text-white p-2">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-header">Sharehoder Register</div>
                    <div class="card-body">
                        <form action="{{ route('shareholder.store')}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <input type="text" name="company_id" value="{{ $companyInfo->id }}" hidden>
                                <div class="col-md-2">
                                    <label for="name">Name<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="shareholder_name" id="name"
                                        placeholder="Shareholder Name" required autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="address">Address<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="shareholder_address" id="address"
                                        placeholder="Shareholder Address" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="contact">Cantact No.<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="tel" class="form-control" name="shareholder_contact" id="contact"
                                        placeholder="Shareholder Contact No." required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="email">Email<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Shareholder Email" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <input class="btn btn-success badge-pill form-control" type="submit" value="Submit">
                                </div>
                                <div class="col-md-2 ">
                                    <input type="reset" class="btn btn-danger badge-pill form-control" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
