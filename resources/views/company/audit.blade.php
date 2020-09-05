@extends('dashboard')
@section('title')
    Company Audit
@endsection
@section('content')
<x-company-sidebar :id="$company_id"></x-company-sidebar>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
                <div class="card">
                    <div class="card-header">Audit</div>
                    <div class="card-body">
                        <form action="{{ route('audit.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <div class="row form-group">
                                <div class="col-md-5">
                                    <input type="text" id="nepali-datepicker" name="audit_date" required
                                placeholder="Audit Date (YYYY-MM-DD)" class="form-control @error('audit_date')is-invalid @enderror">
                                   @error('audit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                        
                                        <input type="text" name="audit_fiscal" id="date" class="form-control @error('audit_fiscal') is-invalid @enderror" required placeholder=" Audit For Fiscal (YYYY)">
                                        @error('audit_fiscal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                             
                                <div class="col-md-3 form-group">
                                    <input class="btn btn-primary badge-pill" type="submit" value="Submit">
                               
                                    <input class="btn btn-danger badge-pill" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                         
                                <tr>
                                    <th scope="col">Audit Date</th>
                                    <th scope="col">Fiscal Year</th>
                                    <th scope="col">Action</th>
                                </tr>


                            </thead>
                            <tbody>
                                @isset($audit)
                                @foreach ($audit as $item)
                           
                                            <tr>

                                            <td>{{$item->audit_date}}</td>
                                                 <td>{{$item->audit_fiscal}}</td>
                                                <td>
                                                   
                                                    <form method="post" action="{{route('audit.destroy',$item->id)}}">
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
                        {{ $audit->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection
