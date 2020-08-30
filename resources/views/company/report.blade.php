@extends('layouts.app')
@section('title')
    Company Advance Search
@endsection
@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Company Advance Search</div>
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
                            <label for="category">Category:</label>
                        </div>
                        <div class="col-md-7">
                            <select type="text"  name="category"
                                class="form-control">
                            <option value="" >All Category</option>
                            <option value="private">Private</option>
                            <option value="public">Public</option>
                            <option value="non-profitable">Non-Profitable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="">Reg. Date</label>
                        </div>
                        <div class="col-md-3">
                            From <input type="text" id="nepali-datepicker" class="form-control" name="reg_fdate" placeholder="YYYY-MM-DD">
                        </div>
                        <div class="col-md-3">
                        to <input type="text" id="nepali-datepicker-1" class="nepali-datepicker form-control" name="reg_ldate" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Total Share
                        </div>
                        <div class="col-md-3">
                            By
                            <select name="share" id="" class="form-control">
                                <option value="=">Equal</option>
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
