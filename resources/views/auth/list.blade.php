@extends('dashboard')
@include('sidemenu')
@section('title')
    List User
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
                <div class="card">
                    <div class="card-header">List</div>
                    <div class="card-body">
                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($user)
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $item->name }}</a></td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <form method="post" action="{{ route('user_destroy', $item->id) }}">
                                                    @csrf
                                                  
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('Are you sure to delete?')"><i
                                                            class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                            title="Delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
