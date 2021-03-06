@extends('dashboard')
@include('sidemenu')
@section('title')
    Company List
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="card-header">Company List </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('company-search-list') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="input-group col-md-12">
                                    <input type="text" id="company-search-input" name="search"
                                        class="form-control rounded-pill" list="suggestions-data-list" placeholder="Search"
                                        aria-label="Search Company" aria-describedby="search" autofocus>
                                    <datalist id="suggestions-data-list">
                                    </datalist>
                                    <div class="input-group-append">

                                        <span id="search">
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fa fa-search"></i></button></span>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 font-bold text-right">
                        Total Result: {{ $count }}</div>
                </div>
                <hr>
                @if ($count == null)
                <div class=" ml-md-3 text-danger">{{ 'Result not found.' }}</div>
            @endif
                <table class="table table-responsive table-hover" {{$count==null ? 'hidden' :'show'}}>
                    <thead>
                        <tr>
                            <th scope="col">Company Name</th>
                            <th scope="col">Reg. No.</th>
                            <th scope="col">Reg. date</th>
                            <th scope="col">Category</th>
                            <th scope="col">Address</th>
                            <th scope="col">Cantact No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">PAN/VAT No.</th>

                            <th colspan="7" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @isset($company_data)
                            @foreach ($company_data as $item)
                                <tr>
                                    <td><a href="{{ route('company.show', $item->id) }}">{{ $item->name }}</a></td>
                                    <td>{{ $item->reg_no }}</td>
                                    <td>{{ $item->reg_date }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->contact_no }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->pan_no }}</td>

                                    <td><a href="{{ route('company.edit', $item->id) }}"><i
                                                class="fa fa-edit btn btn-primary btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"></i></a></td>
                                    <td><a href="{{ route('document.show', $item->id) }}"><i
                                                class="fa fa-file btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Document"></i></a></td>
                                    <td><a href="{{ route('shareholder.show', $item->id) }}"><i
                                                class="fa fa-users btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Shareholder"></i></a></td>
                                    <td><a href="{{ route('renew.show', $item->id) }}"><i
                                                class="fa fa-redo btn btn-success btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Renew Report"></i></a></td>
                                    <td><a href="{{ route('audit.show', $item->id) }}"><i class="fa fa-book btn btn-info btn-sm"
                                                data-toggle="tooltip" data-placement="bottom" title="Audit Report"></i></a></td>
                                    <td><a href="{{ route('namechange.show', $item->id) }}"><i
                                                class="fa fa-address-card btn btn-secondary btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Name Change"></i></a></td>
                                    <td>
                                        <form method="post" action="{{ route('company.destroy', $item->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"
                                                    data-toggle="tooltip" data-placement="bottom" title="Delete"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endisset

                    </tbody>

                </table>
                {{ $company_data->links() }}
            </div>
        </div>
    </div>

@endsection
