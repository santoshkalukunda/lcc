@extends('dashboard')
@section('title')
    Company Namechange
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
                    <div class="card-header">Name Change</div>
                    <div class="card-body">
                        <form action="{{ route('namechange.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <div class="row form-group">
                                <div class="col-md-5">
                                    <input type="text" id="nepali-datepicker" name="change_date" required
                                placeholder="Change Date (YYYY-MM-DD)" class="form-control @error('change_date')is-invalid @enderror">
                                   @error('change_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                        <input type="text" name="new_name" id="date" class="form-control @error('new_name') is-invalid @enderror" required placeholder="New Company Name">
                                        @error('new_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                             
                                <div class="col-md-3 form-group">
                                    <input class="btn btn-primary badge-pill" type="submit" value="Change">
                               
                                    <input class="btn btn-danger badge-pill" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                         
                                <tr>
                                    <th scope="col">Change Date</th>
                                    <th scope="col">Old Name</th>
                                    <th scope="col">New Name</th>
                                    <th scope="col">Action</th>
                                </tr>


                            </thead>
                            <tbody>
                                @isset($namechange)
                                @foreach ($namechange as $item)
                           
                                            <tr>

                                            <td>{{$item->change_date}}</td>
                                            <td>{{$item->old_name}}</td>
                                                 <td>{{$item->new_name}}</td>
                                                <td>
                                                   
                                                    <form method="post" action="{{route('namechange.destroy',$item->id)}}">
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
                        {{ $namechange->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection
