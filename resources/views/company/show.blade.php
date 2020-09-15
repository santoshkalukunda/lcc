@extends('dashboard')
@section('title')
    {{ $companyInfo->name }}
@endsection
@section('content')
<x-company-sidebar :id="$companyInfo->id"></x-company-sidebar>
    
       
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card info">
                    <div class="card-header">About</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush font-17">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-2 font-bold">User Name</div>
                                    <div class="col-md-4 text-capitalize">{{ $companyInfo->user_name }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2 font-bold">Registration No.</div>
                                    <div class="col-md-4">{{ $companyInfo->reg_no }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2 font-bold">Registration Date</div>
                                    <div class="col-md-4">{{ $companyInfo->reg_date }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2 font-bold">Fiscal Year</div>
                                    <div class="col-md-4">{{ $companyInfo->fiscal_year }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2 font-bold">Category</div>
                                    <div class="col-md-4 text-capitalize">{{ $companyInfo->category }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2 font-bold">PA/VAT No.</div>
                                    <div class="col-md-4 text-capitalize">{{ $companyInfo->pan_no }}</div>
                                </div>
                                <hr>
                            </li>
                            <div class="row form-group">
                                <div class="col-md-2"><a href="{{ route('company.edit', $companyInfo->id) }}"
                                        class="text-decoration-none text-white"><button class="btn btn-primary badge-pill form-control"
                                            type="button"><i class="fa fa-edit"> Edit</i></button></a>
                                </div>
                                <div class="col-md-2">
                                    <form method="post" action="{{ route('company.destroy', $companyInfo) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-md badge-pill form-control mb-1" type="submit"
                                            onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"
                                                data-toggle="tooltip" data-placement="bottom" title="Delete"> Delete
                                            </i></button>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
      
@endsection
