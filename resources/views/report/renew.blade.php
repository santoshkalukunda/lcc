@extends('layouts.app')
@section('title')
    Company Renew
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Renew</div>
                    <div class="card-body">
                    
                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Company name</th>
                                    <th scope="col">Remaining Days</th>
                                    <th scope="col">Last Renew Date</th>
                                    <th scope="col">Fiscal Year</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @isset($renew)
                                    @foreach ($renew as $item)

                                        <tr>
                                        <td>{{$item->name}}</td>
                                            <td></td>
                                            <td>@isset($item->renew->enew_fiscal)
                                                {{ $item->renews->renew_date }}
                                            @endisset
                                              </td>
                                            <td>@isset($item->renew->enew_fiscal)
                                                {{ $item->renew->enew_fiscal }}
                                            @endisset 
                                             </td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                                <form method="post" action="{{ $item->id }}">
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

                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
