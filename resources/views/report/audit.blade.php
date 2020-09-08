@extends('dashboard')
@include('sidemenu')
@section('title')
    Company Audit Report
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Audit Report</div>
                    <div class="col-md-12 text-md-right"><b>Total Result: {{$count}}</b> </div>
                    <div class="card-body">
                    <form action="{{route('audit.search')}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-2">
                                    Company Name
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control" placeholder="Company Name">
                                </div>
                                <div class="col-md-1">
                                    Status
                                </div>
                                <div class="col-md-2">
                                    <select name="status" class="form-control" id="">
                                        <option value="">All</option>
                                        <option value="audited">Audited</option>
                                        <option value="not_audited">Not Audited</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-info" value="Search">
                                </div>
                            </div>
                        </form>

                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Company name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Last Audit Date</th>  
                                    <th scope="col">Status</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($audit)
                                    @foreach ($audit as $item)
                                   
                                           <tr class="{{ $date->fiscal != $item->auditreport_fiscal ? 'table-danger' : 'default' }}">
                                            <td><a href="{{ route('audit.show', $item->company_id) }}">{{ $item->name }}</a></td>
                                            <td>{{$item->contact_no}}</td>
                                            <td>{{ $date->audit_date }}</td>
                                            
                                            <td>
                                                {{ $date->fiscal == $item->auditreport_fiscal ? '' : 'Not'}} Audited
                                            </td>
                                            <td>
                                                <div style="height:120px;width:250px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                    {!! $item->auditreport_comments !!}
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="collapse"
                                                data-target="#{{ 'comments' . "$item->id" }}">Comments</button>
    
                                            <div id="{{ 'comments' . "$item->id" }}" class="collapse">
                                                <form action="{{route('audit.update',$item->id)}}" method="POST">
                                                    @method('put')
                                                    @csrf
                                             
                                                    <textarea name="audit_comments" class="form-control" rows="3" cols="25" placeholder="Comments here.." required>
                                                    </textarea>
                                                    <input type="submit" class="btn btn-success mt-1">
                                              </form>
                                            </div>
                                               
                                            </td>
                                        </tr>

                                    @endforeach

                                @endisset
                            </tbody>
                        </table>
                        {{$audit->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
