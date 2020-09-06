@extends('dashboard')
@include('sidemenu')
@section('title')
    Set Date edit
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Set Date Edit</div>
            <div class="card-body">
                <form action="{{ route('setdate.update',$setdate->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            Fiscal Year
                        </div>
                        <div class="col-md-8">
                        <input type="text" class="form-control" value="{{$setdate->fiscal}}" name="fiscal" id="fiscal" placeholder="YYYY" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">Audit Date</div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{$setdate->audit_date}}" id="nepali-datepicker-1" name="audit_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Renew Date
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{$setdate->renew_date}}" id="nepali-datepicker" name="renew_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Report Date
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{$setdate->report_date}}" id="nepali-datepicker-2" name="report_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"><input type="submit" class="btn btn-success" value="Set"></div>
                    </div>
                </form>
        
        </div>
    </div>
    </div>
@endsection
