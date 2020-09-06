@extends('dashboard')
@include('sidemenu')
@section('title')
    Company Profile
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="col-md-12">
  @if (Session::has('success'))
  <div class="bg-success text-white p-2">
      {{ Session::get('success') }}
  </div>
@endif
    <div class="card">
        <div class="card-header">Company Profile</div>

        <div class="card-body">
          <div class="col-md-2 mt-3 mb-3"><a href="{{route('profile.create')}}"><button class="btn btn-info"><i class="fa fa-plus"> Add Profile</i> </button></a></div>

            @isset($profile)

            @foreach ($profile as $item)
            <h4>
          <div class="row">
              <div class="col-md-1">Logo</div>
          <div class="col-md-2"><img src="{{ asset('storage/' . $item->logo) }}" id="image" class="img-thumbnail rounded float-right mx-auto d-block img-fluid"
            style="width:40%"></div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-home" aria-hidden="true"></i></i> </div>
            <div class="col-md-4">{{$item->name}}</div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="col-md-4">{{$item->address}}</div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-phone-square" aria-hidden="true"></i> </div>
            <div class="col-md-4">{{$item->contact}}</div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-envelope" aria-hidden="true"></i></div>
            <div class="col-md-4"><a href="mailto:{{$item->email}}">{{$item->email}}</a></div>
          </div>
          <div class="row">
            <div class="col-md-2 "> <i class="fa fa-facebook-official" aria-hidden="true"></i></div>
            <div class="col-md-4"><a href="{{$item->facebook}}">{{$item->facebook}}</a> </div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-twitter" aria-hidden="true"></i></div>
            <div class="col-md-4"><a href="{{$item->twitter}}">{{$item->twitter}}</a> </div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
            <div class="col-md-4"><a href="{{$item->linkedin}}">{{$item->linkedin}}</a> </div>
          </div>
          <div class="row">
            <div class="col-md-2"><i class="fa fa-youtube" aria-hidden="true"></i></div>
            <div class="col-md-4"><a href="{{$item->youtube}}">{{$item->youtube}}</a></div>
          </div>
        </h4>
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('profile.edit', $item->id) }}">
                    <button type="button" class="btn btn-primary" data-toggle="collapse"
                        data-target="#comments"><i class="fa fa-edit"> Edit</i></button></a>
            </div>
            <div class="col-md-2">
                <form method="post" action="{{ route('profile.destroy', $item->id) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Are you sure to delete?')"><i
                            class="fa fa-trash" title="Delete"> Delete</i></button>
                </form>
            </div>
        </div>
        
          @endforeach

          @endisset
        </div>
    </div>
</div>

@endsection




