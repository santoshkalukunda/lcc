@extends('dashboard')
@include('sidemenu')
@section('title')
    Documetn Type
@endsection
@section('content')
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="bg-success text-white p-2">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Document Type</div>

            <div class="card-body">
                <form action="{{ route('documenttype.update',$documenttype->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="row form-group">
                    <div class="col-md-4 mt-2"><input type="text" value="{{$documenttype->type}}" class="form-control text-capitalize" name="type"
                                id="type" placeholder="Document Type" required autofocus></div>

                        <div class="col-md-2 mt-2">
                            <input type="submit" class="form-control btn btn-success rounded-pill" value="Update">
                        </div>

                    </div>
                </form>
                <hr>
            </div>
        </div>
    </div>

@endsection
