@extends('menu')
@section('title')
    Sharholder List
@endsection
@section('body')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Shareholder</div>
            <div class="card-body">
                <button onclick="myFunction()">Click Me</button>
                <div id="myDIV">
                    This is my DIV element.
                </div>
                <a href="{{ route('shareholder.create') }}"><i class="fa fa-plus btn btn-primary"> Add</i> </a>
                <table class="table table-hover mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Total Share</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. of Share</th>

                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td>10</td>
                            <td>Suresh</td>
                            <td>dhn</td>
                            <td>0987654321</td>
                            <td>emai@email.com</td>
                            <td>2</td>

                            <td><a href="{{ route('shareholder.edit', '1') }}"><i class="fa fa-edit btn btn-primary btn-sm"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit"></i></a></td>

                            <td>
                                <form method="post" action="">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit"
                                        onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"
                                            data-toggle="tooltip" data-placement="bottom" title="Delete"></i></button>

                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
@endsection
