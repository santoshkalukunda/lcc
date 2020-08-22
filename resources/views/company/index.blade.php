@extends('layouts.app')
@section('title')
    Company List
@endsection
@section('content')
    <div class="col-md-10">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="card-header">Company List </div>
            <div class="card-body">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Company Name</th>
                            <th scope="col">Reg. No.</th>
                            <th scope="col">Reg. date</th>
                            <th scope="col">Fiscal Year</th>
                            <th scope="col">Address</th>
                            <th scope="col">Cantact No.</th>
                            <th scope="col">Total Share</th>

                            <th colspan="4" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($company_data)
                            @foreach ($company_data as $item)
                                <tr>
                                   
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->reg_no }}</td>
                                    <td>{{ $item->reg_date }}</td>
                                    <td>{{ $item->fiscal_year }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->contact_no }}</td>
                                    <td>{{ $item->share }}</td>

                                    <td><a href="{{ route('company.edit', $item->id) }}"><i
                                                class="fa fa-edit btn btn-primary btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"></i></a></td>
                                    <td><a href="{{ route('document.show', $item->id) }}"><i
                                                class="fa fa-file btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Document"></i></a></td>
                                    <td><a href="{{ route('shareholder.show', $item->id) }}"><i
                                                class="fa fa-users btn btn-success btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Shareholder"></i></a></td>
                                    <td>
                                        <form method="post" action="{{ route('company.destroy', $item->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('Are you sure to delete?')"><i
                                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                    title="Delete"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>

                </table>
                {{ $company_data->links() }}

            </div>
        </div>
    </div>
@endsection
