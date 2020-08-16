@extends('layouts.app')
@section('title')
    Sharehoder Register
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <x-company-sidebar :id="$companyInfo->id"></x-company-sidebar>
            </div>
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('success'))
                        <div class="bg-success text-white p-2">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-header">Sharehoder Register</div>
                    <div class="card-body">
                    <form action="{{route('shareholder.store')}}" method="post">
                            @csrf
                            <div class="row">
                            <input type="text" name="company_id" value="{{$companyInfo->id}}" hidden>
                                <div class="col-3 form-group">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-8 form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Shareholder Name" required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-8 form-group">
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="Shareholder Address" required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="contact">Cantact No.</label>
                                </div>
                                <div class="col-8 form-group">
                                    <input type="tel" class="form-control" name="contact" id="contact"
                                        placeholder="Shareholder Contact No." required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-8 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Shareholder Email" required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="share">No. of Share</label>
                                </div>
                                <div class="col-8 form-group">
                                    <input type="number" class="form-control" name="share" id="share" placeholder="No. of Share"
                                        required>
                                </div>
                                <div class="col-3 form-group">

                                </div>
                                <div class="col-8 form-group">
                                    <input class="btn btn-success" type="submit" value="Submit">
                                    <input type="reset" class="btn btn-danger" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
