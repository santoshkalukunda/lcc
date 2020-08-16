@extends('layouts.app')
@section('title')
    Sharehoder Update
@endsection
@section('content')
@foreach ($shareholder as $shareholder)
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
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
                                <div class="col-3 form-group">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-8 form-group">
                                <input type="text" class="form-control" name="name" value="{{$shareholder->name}}" id="name"
                                        placeholder="Shareholder Name" required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-8 form-group">
                                <input type="text" class="form-control" name="address" value="{{$shareholder->address}}" id="address"
                                        placeholder="Shareholder Address" required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="contact">Cantact No.</label>
                                </div>
                                <div class="col-8 form-group">
                                <input type="tel" class="form-control" name="contact" value="{{$shareholder->contact}}" id="contact"
                                        placeholder="Shareholder Contact No." required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-8 form-group">
                                <input type="email" class="form-control" name="email" value="{{$shareholder->email}}" id="email"
                                        placeholder="Shareholder Email" required>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="share">No. of Share</label>
                                </div>
                                <div class="col-8 form-group">
                                <input type="number" class="form-control" name="share" value="{{$shareholder->share}}" id="share"  placeholder="No. of Share"
                                        required>
                                </div>
                                <div class="col-3 form-group">

                                </div>
                                <div class="col-8 form-group">
                                    <input class="btn btn-success" type="submit" value="Update">
                                <button class="btn btn-danger" ><a href="{{route('shareholder.show',$shareholder->company_id)}}" class="text-decoration-none text-white">Cancel</a></button>
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
