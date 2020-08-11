@extends('dashboard')
@section('title')
Document Upload
@endsection
@section('body')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Upload Document</div>
        <div class="card-body">
        <form action="" method="post">
            <div class="row form-group">
                <input class="form-control" type="file" name="file" id="">
            </div>
            <div class="row form-group">
                <select name="name" id=""  class="form-control" >
                    <option value="Reg">Reg.</option>
                    <option value="PAN">PAN</option>
                    <option value="Other">Other</option>

                </select>
            </div>
            
        </form>
        </div>
    </div>
</div>
@endsection