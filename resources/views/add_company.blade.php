@extends('home')
@section('title')
    Add Commpany
@endsection
@section('body')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Register Company</div>

        <div class="card-body">
        <form action="{{route('company.store')}}" method="post" class="form-group">
            @csrf
               <div class="row form-group">
                   <div class="col-3">
                       <label for="name" class="form-control">Company Name:</label>
                   </div>
                   <div class="col-8">
                       <input type="text" name="name" required placeholder="Comapany Name" class="form-control">
                   </div>
                   <div class="col-3">
                    <label for="name" class="form-control">Reg. No:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="reg_no" required placeholder="Reg. no" class="form-control">
                </div>
                <div class="col-3">
                    <label for="name"  class="form-control">Reg. Date:</label>
                </div>
                <div class="col-8">
                    <input type="date" name="reg_date" required placeholder="Reg. Date" class="form-control">
                </div>
                <div class="col-3">
                    <label for="name" class="form-control">Reg. Fiscal Year:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="fiscal_year" required placeholder="Reg. Fiscal Year" class="form-control">
                </div>
                <div class="col-3">
                    <label for="name" class="form-control">Address:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="address" required placeholder="Address" class="form-control">
                </div>
                <div class="col-3">
                    <label for="name" class="form-control">Office Contact No.:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="contact_no" required placeholder="Office Contact No." class="form-control">
                </div>
               </div>
               <div class="row">
              
                 <div class="col-2"><input class="btn btn-success" type="submit"></div>
                 <div class="col-2"><input class="btn btn-danger" type="reset"></div>
               </div>
           </form>
        </div>
    </div>
</div>

@endsection
   
