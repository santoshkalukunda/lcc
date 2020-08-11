@extends('dashboard')
@section('title')
  Company List  
@endsection

@section('body')
<div class="col-md-10">
    <div class="card">
        <div class="card-header">Company List</div>
        <div class="card-body">
            
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Reg. No.</th>
                    <th scope="col">Reg. date</th>
                    <th scope="col">Fiscal Year</th>
                    <th scope="col">Address</th>
                    <th scope="col">Cantact</th>
                  
                    <th colspan="2" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($company_data)
                @foreach ($company_data as $item)
                <tr>
                <th>{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->reg_no}}</td>
                    <td>{{$item->reg_date}}</td>
                    <td>{{$item->fiscal_year}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->contact_no}}</td>
                  
                <td><a href="{{route('company.index',$item->id)}}"><i class="fa fa-edit btn btn-primary"></i></a></td>
                    <td><a href="{{route('company.index',$item->id)}}"><i class="fa fa-trash btn btn-danger"></i></a></td>
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




