@extends('dashboard')
@section('title')
    Sharehoder Update
@endsection
@section('content')
<x-company-sidebar :id="$shareholder->company_id"></x-company-sidebar>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('success'))
                        <div class="bg-success text-white p-2">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-header">Sharehoder Update</div>
                    <div class="card-body">
                       
                    <form action="{{route('shareholder.update',$shareholder->id)}}" method="post">
                        @method('put')
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="name">Name<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name="shareholder_name" value="{{$shareholder->shareholder_name}}" id="name"
                                        placeholder="Shareholder Name" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="address">Address<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name="shareholder_address" value="{{$shareholder->shareholder_address}}" id="address"
                                        placeholder="Shareholder Address" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="contact">Cantact No.<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8 ">
                                <input type="tel" class="form-control" name="shareholder_contact" value="{{$shareholder->shareholder_contact}}" id="contact"
                                        placeholder="Shareholder Contact No." required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="email">Email<span class=" color-red">*</span></label>
                                </div>
                                <div class="col-md-8 ">
                                <input type="email" class="form-control" name="email" value="{{$shareholder->email}}" id="email"
                                        placeholder="Shareholder Email" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <input class="btn btn-success badge-pill form-control" type="submit" value="Update">

                                </div>
                                <div class="col-md-2">
                                      <button class="btn btn-info badge-pill form-control" ><a href="{{route('shareholder.show',$shareholder->company_id)}}" class="text-decoration-none text-white">Cancel</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
