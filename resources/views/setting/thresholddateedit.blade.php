@extends('dashboard')
@include('sidemenu')
@section('title')
    Update Threshold Date
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Update Threshold Date</div>
            <div class="card-body">

                <form action="{{ route('thresholddate.update',$thresholddate->id)}}" method="post" >
                    @method('put');
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-3">
                        <input type="text" id="nepali-datepicker" value="{{$thresholddate->audit_date}}" name="audit_date" required
                                placeholder="Audit Date YYYY-MMM-DD" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="nepali-datepicker-1" value="{{$thresholddate->renew_date}}" name="renew_date" required
                                placeholder="Renew Date YYYY-MMM-DD" class="form-control">

                        </div>
                        <div class="col-md-2"><input type="submit" class="btn btn-success" value="Update"></div>
                    </div>
                </form>
             
            </div>
        </div>
    </div>
@endsection
