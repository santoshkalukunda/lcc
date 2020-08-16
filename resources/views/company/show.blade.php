@extends('layouts.app')
@section('title')
{{$companyInfo->name}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <x-company-sidebar :id="$companyInfo->id"></x-company-sidebar>
            </div>
            <div class="col-8">
                @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
                    <div class="card info">
                    <div class="card-header">About</div>
                        <div class="card-body">
                        <form action="#" method="post" class="form-group">
                            @method('put')
                            @csrf
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="company-name" class="">Company Name :</label>
                                </div>
                                
                                <div class="col-8">
                                    <input value="{{$companyInfo->name}}" type="text" id="company-name" name="name" required placeholder="Comapany Name"
                                class="form-control" disabled >
                                  
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-3">
                                    <label for="reg_no">Reg. No:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" value="{{$companyInfo->reg_no}}" id="reg_no" required name="reg_no" placeholder="Reg. no"
                                        class="form-control " disabled>
                                </div>
                    </div>
                    <div class="row form-group">
        
                        <div class="col-3">
                            <label for="reg_date">Reg. Date:</label>
                        </div>
                        <div class="col-8">
                            <input type="date" value="{{$companyInfo->reg_date}}" id="reg_date"  name="reg_date" required placeholder="Reg. Date"
                                class="form-control" disabled>
                          
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="fiscal_year" >Reg. Fiscal Year:</label>
                        </div>
                        <div class="col-8">
                            <input type="number" value="{{$companyInfo->fiscal_year}}" id="fiscal_year"
                        name="fiscal_year" value="{{date('yyyy')}}"  required placeholder="Reg. Fiscal Year" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="address" >Address:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" value="{{$companyInfo->address}}" id="address"  name="address"
                                required placeholder="Address" class="form-control " disabled>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="contact_no">Office Contact No.:</label>
                        </div>
                        <div class="col-8">
                            <input type="tel" value="{{$companyInfo->contact_no}}" 
                                name="contact_no" id="contact_no" required placeholder="Office Contact No." class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="share">Total Share:</label>
                        </div>
                        <div class="col-8">
                            <input type="number"  value="{{$companyInfo->share}}"
                                name="share" id="share" required placeholder="Total Share" class="form-control" disabled>
                        </div>
                    </div>
                  
                    <div class="row">
                    <div class="col-2"><a href="{{ route('company.edit', $companyInfo->id) }}" class="text-decoration-none text-white"><button class="btn btn-primary" type="button"><i class="fa fa-edit"> Edit</i></button></a></div>
                    </div>
                    </form>

                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
