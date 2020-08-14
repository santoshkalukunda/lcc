@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="card border-light" style="max-width: 18rem;">
                    <div class="card-header">Company Name</div>
                    <div class="card-body">
                        <p class="card-text">Address <br> Cantact</p>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#document" role="tab" data-toggle="tab">Document</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#shareholder" role="tab" data-toggle="tab">Shareholder</a>
                    </li>
                  </ul>
                  
                  <!DOCTYPE html>
                  <html>
                   <head>
                    <title>Live search in laravel using AJAX</title>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                   </head>
                   <body>
                    <br />
                    <div class="container box">
                     <h3 align="center">Live search in laravel using AJAX</h3><br />
                     <div class="panel panel-default">
                      <div class="panel-heading">Search Customer Data</div>
                      <div class="panel-body">
                       <div class="form-group">
                        <input type="text" list="suggestions" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                       </div>

                       <datalist id="suggestions">
                    </datalist>
                       <div class="table-responsive">
                        <h3 align="center">Total Data : <span id="total_records"></span></h3>
                        <table class="table table-striped table-bordered">
                         <thead>
                          <tr>
                           <th>Customer Name</th>
                           <th>Address</th>
                           <th>City</th>
                           <th>Postal Code</th>
                           <th>Country</th>
                          </tr>
                         </thead>
                         <tbody>
                  
                         </tbody>
                        </table>
                       </div>
                      </div>    
                     </div>
                    </div>
                   </body>
                  </html>
                  
                  <script>
                  $(document).ready(function(){
                  
                   fetch_customer_data();
                  
                   function fetch_customer_data(query = '')
                   {
                    $.ajax({
                     url:"{{ route('live_search.action') }}",
                     method:'GET',
                     data:{query:query},
                     dataType:'json',
                     success:function(data)
                     {
                      $('datalist').html(data.table_data);
                     }
                    })
                   }
                  
                   $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    fetch_customer_data(query);
                   });
                  });
                  </script>
            </div>
        </div>
    </div>
    </div>
@endsection
