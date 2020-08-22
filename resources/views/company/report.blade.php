@extends('layouts.app')
@section('title')
    Company Report
@endsection
@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Company Report</div>
            <div class="card-body">
            <form action="{{route('company.report.show')}}" method="post" class="form-group">
                @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="">Name</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="">Address</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Total Share
                        </div>
                        <div class="col-md-3">
                            By
                            <select name="share" id="" class="form-control">
                                <option value="">Select Option</option>
                                <option value="=">Equal</option>
                                <option value="max">Maximum</option>
                                <option value="min">Minimum</option>
                                <option value=">">Greater Than</option>
                                <option value="<">Less Than</option>
                                <option value="between">Between</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            From<input type="number" class="form-control" name="fshare" placeholder="share">
                        </div>
                        <div class="col-md-2">
                            To<input type="number" class="form-control" name="lshare" placeholder="share">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="">Reg. Date</label>
                        </div>
                        <div class="col-md-3">
                            From <input type="date" class="form-control" name="reg_fdate">
                        </div>
                        <div class="col-md-3">
                            To<input type="date" class="form-control" name="reg_ldate">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <input type="submit" class="form-control btn btn-info" value="Search">
                        </div>
                        <div class="col-md-2">
                            <input type="reset" class="form-control btn btn-danger" value="reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
