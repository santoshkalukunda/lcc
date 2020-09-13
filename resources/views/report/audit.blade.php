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

                        <div class="row">
                            @isset($audit)
                            @foreach ($audit as $item)

                            <div class="col-md-4">
                                <div class="card-slip">
                                    <div class="card mb-3" style="max-width: 27rem; background-color:{{ $date->fiscal != $item->auditreport_fiscal ? '#da8f8f' : 'white' }}">
                                        <a href="{{ route('audit.show', $item->company_id) }}">
                                            <div class="card-header font-bold text-decoration-none"
                                                style="color:black;" onMouseOver="this.style.backgroundColor='#b5f5cc'"   onMouseOut="this.style.backgroundColor='{{ $date->fiscal != $item->auditreport_fiscal ? '#da8f8f' : 'white' }}'">
                                                {{ $item->name }}</div>
                                        </a>
                                        <div class="card-body pt-0">
                                            <p class="card-text font-bold pt-0">{{ $item->contact_no }}</p>
                                            <p class="card-text font-bold text-capitalize pt-0">
                                                {{ $date->fiscal == $item->auditreport_fiscal ? '' : 'Not' }} Audited
                                            </p>
                                            <p class="card-text text-capitalize">
                                            <div
                                                style="height:150px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                {!! $item->auditreport_comments !!}
                                            </div>
                                            </p>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary fa fa-comment"
                                                data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                Comments
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Change Status
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('audit.update',$item->id)}}" method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">Status</div>
                                                                    <div class="col-md-8">
                                                                        <select name="auditreport_status" class="form-control" id="">
                                                                            <option value="notaudited">Not Audited</option>
                                                                            <option value="audited">Audited</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                Comments
                                                                <textarea name="audit_comments" class="form-control" rows="3" cols="25" required>
                                                                </textarea>
                                                             
                                                                <input type="submit" class="btn btn-success mt-1">
                                                          </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset

                        </div>
                        {{$audit->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
