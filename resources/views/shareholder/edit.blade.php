@extends('layouts.app')
@section('title')
    Sharehoder Update
@endsection
@section('content')
@foreach ($shareholder as $shareholder)
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-company-sidebar :id="$shareholder->company_id"></x-company-sidebar>
            </div>
            <div class="col-md-8">
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
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="text" class="form-control" name="shareholder_name" value="{{$shareholder->shareholder_name}}" id="name"
                                        placeholder="Shareholder Name" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="text" class="form-control" name="shareholder_address" value="{{$shareholder->shareholder_address}}" id="address"
                                        placeholder="Shareholder Address" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="contact">Cantact No.</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="tel" class="form-control" name="shareholder_contact" value="{{$shareholder->shareholder_contact}}" id="contact"
                                        placeholder="Shareholder Contact No." required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="email" class="form-control" name="shareholder_email" value="{{$shareholder->shareholder_email}}" id="email"
                                        placeholder="Shareholder Email" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="share">No. of Share</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="number" class="form-control" name="shareholder_share" value="{{$shareholder->shareholder_share}}" id="share"  placeholder="No. of Share"
                                        required>
                                </div>
                                <div class="col-md-3 form-group">

                                </div>
                                <div class="col-md-8 form-group">
                                    <input class="btn btn-success badge-pill" type="submit" value="Update">
                                      <button class="btn btn-info badge-pill" ><a href="{{route('shareholder.show',$shareholder->company_id)}}" class="text-decoration-none text-white">Cancel</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
