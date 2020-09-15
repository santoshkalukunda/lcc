@extends('dashboard')
@include('sidemenu')
@section('title')
    Contact Us List
@endsection
@section('content')
    <div class="col-md-12">
        @if (Session::has('success'))
        <div class="bg-success text-white p-2">
            {{ Session::get('success') }}
        </div>
    @endif
        <div class="card">
            <div class="card-header">Contact Us List</div>
            <div class="card-body">
                <table class="table table-responsive table-hover">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>mesage</th>
                    <th>Action</th>
                    @isset($contactus)
                        @foreach ($contactus as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->contact}}</td>
                            <td>{{$item->email}}</td>
                            <td><textarea  id="" cols="35" rows="5" readonly>{{$item->message}}
                            </textarea>
                                 </td>
                                 <td>
                                    <a href="{{ route('contactus.destroy', $item->id) }}" onclick="return confirm('Are you sure to delete?')"><i
                                        class="fa fa-trash btn btn-danger" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"></i></a>
                                 </td>
                            </tr>

                        @endforeach
                    @endisset
                </table>
                {{ $contactus->links() }}
            </div>
        </div>
    </div>

@endsection
