@extends('dashboard')
@include('sidemenu')
@section('title')
    Downloads
@endsection
@section('content')
    <div class="col-md-12">
        @if (Session::has('success'))
        <div class="bg-success text-white p-2">
            {{ Session::get('success') }}
        </div>
    @endif
        <div class="card">
            <div class="card-header">Downloads</div>
            <div class="card-body">
                <a href="{{route('download.create')}}" class=" btn-info btn rounded-pill fa fa-plus mb-2"> Add New</a>
                <table class="table  table-responsive-md table-hover">
                    <th>Date</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                    @isset($download)
                        @foreach ($download as $item)
                            <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{$item->name}}</td>
                            <td>
                            <a href="{{asset('storage/'.$item->file)}}" class=" btn-info btn fa fa-eye" data-toggle="tooltip"
                                data-placement="bottom" title="View"></a>
                            </td>
                                 <td>
                                    <form method="post" action="{{ route('download.destroy', $item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Are you sure to delete?')"><i
                                                class="fa fa-trash" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete"></i></button>
                                    </form>
                                 </td>
                            </tr>

                        @endforeach
                    @endisset
                </table>
            </div>
        </div>
    </div>

@endsection
