@extends('dashboard')
@section('title')
    Company Document
@endsection
@section('body')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Company Document </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row form-group">
                <input class="form-control" type="file" name="file" accept=
                "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                text/plain, application/pdf, image/*" id="">
            </div>
            <div class="row form-group">
                <input type="text" name="type" id="tags" class="form-control" placeholder="Document Name">
                
            </div>
            <input class="btn btn-primary" type="submit" value="Upload">
            <input class="btn btn-danger" type="reset" value="Reset">
        </form> 
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Document</th>
                        <th scope="col">Document Type</th>
                        <th colspan="3" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <th>file</th>
                                <td>Pan</td>
                                <td><a href=""><i class="fa fa-eye btn btn-primary btn-sm"></i></a></td>
                                <td>
                                    <form method="post" action="">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Are you sure to delete this banner?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/script/script.js"></script>
@endsection




