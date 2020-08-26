@extends('layouts.app')
@section('title')
    Company Renew
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-company-sidebar :id="$company_id"></x-company-sidebar>
            </div>
            <div class="col-md-9">
                @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
                <div class="card">
                    <div class="card-header">Renew</div>
                    <div class="card-body">
                        <form action="{{ route('renew.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <div class="row form-group">
                                <div class="col-md-5">
                                    <input type="text" id="nepali-datepicker" name="renew_date" required
                                placeholder="Renew Date (YYYY-MM-DD)" class="form-control @error('renew_date')is-invalid @enderror">
                                   @error('renew')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                        
                                        <input type="text" name="renew_fiscal" id="date" class="form-control @error('renew_fiscal') is-invalid @enderror" required placeholder=" Renew For Fiscal (YYYY)">
                                        @error('renew_fiscal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                             
                                <div class="col-md-3 form-group">
                                    <input class="btn btn-primary badge-pill" type="submit" value="Renew">
                               
                                    <input class="btn btn-danger badge-pill" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                         
                                <tr>
                                    <th scope="col">Renew Date</th>
                                    <th scope="col">Fiscal Year</th>
                                    <th scope="col">Action</th>
                                </tr>


                            </thead>
                            <tbody>
                                @isset($renew)
                                @foreach ($renew as $item)
                           
                                            <tr>

                                            <td>{{$item->renew_date}}</td>
                                                 <td>{{$item->renew_fiscal}}</td>
                                                <td>
                                                   
                                                    <form method="post" action="{{$item->id}}">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection
