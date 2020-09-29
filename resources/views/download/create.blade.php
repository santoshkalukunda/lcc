@extends('dashboard')
@include('sidemenu')
@section('title')
    Add Download Form
@endsection
@section('content')
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="bg-success text-white p-2">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Add Downloads Form</div>
            <div class="card-body">
            <form action="{{route('download.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class=" col-md-3">
                            <label for="Date">Date</label>
                            <input type="text" name="date" id="nepali-datepicker" class=" form-control"
                                placeholder="Date YYYY-MM-DD"  required>
                        </div>
                        <div class=" col-md-4 ">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class=" form-control" placeholder="Document name" required>
                        </div>
                        <div class=" col-md-3">
                            <label for="File">Document</label>
                            <input type="file" name="file" class=" form-control-file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                            text/plain, application/pdf, image/*" required>
                        </div>
                        <div class=" col-md-2">
                            <label for=""></label>
                            <input type="submit" value="Upload" class=" form-control btn-info btn rounded-pill">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
