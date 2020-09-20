@extends('dashboard')
@include('sidemenu')
@section('title')
वार्षिक अध्यावधिक
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
                    <div class="card-header">वार्षिक अध्यावधिक</div>
                    <div class="row mt-md-3 ml-md-3 mr-md-3">
                        <div class="col-md-2">
                        <form action="{{route('allrenewreport.mail')}}" method="post">
                                @csrf
                               <input type="submit" class="form-control btn-info badge-pill" data-toggle="tooltip"
                               data-placement="bottom" title="Send mail to not renewed all shareholders" value="Send Email">
                            </form>
                        </div>
                        <div class="col-md-10 text-md-right"><b>Total Results: {{ $count }}</b> </div>
                    </div> 
                    <div class="card-body">
                        <form action="{{ route('renew.search') }}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-2">
                                    Company Name
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control" placeholder="Company Name" autofocus>
                                </div>
                                <div class="col-md-1">
                                    Status
                                </div>
                                <div class="col-md-2 form-group">
                                    <select name="status" class="form-control" id="">
                                        <option value="">All</option>
                                        <option value="renewed">Renewed</option>
                                        <option value="not_renew">Not Renew</option>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="submit" class="btn btn-info form-control badge-pill" value="Search">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            @if ($count == null)
                               <div class=" ml-md-3 text-danger">{{ "Result not found." }}</div> 
                            @endif
                            @isset($renew)
                                @foreach ($renew as $item)
                                    <div class="col-md-4">
                                        <div class="card-slip">
                                            <div class="card mb-3" style="max-width: 27rem; background-color:{{ $date->fiscal != $item->renewreport_fiscal ? '#da8f8f' : 'default' }}">
                                                <a href="{{ route('renew.show', $item->company_id) }}">
                                                    <div class="card-header font-bold text-decoration-none"
                                                        style="color:black;" onMouseOver="this.style.backgroundColor='#b5f5cc'"   onMouseOut="this.style.backgroundColor='{{ $date->fiscal != $item->auditreport_fiscal ? '' : '' }}'">
                                                        {{ $item->name }}</div>
                                                </a>
                                                <div class="card-body pt-0">
                                                    <p class="card-text font-bold pt-0">{{ $item->contact_no }}</p>
                                                    <p class="card-text font-bold text-capitalize pt-0">
                                                        {{ $date->fiscal == $item->renewreport_fiscal ? '' : 'Not' }} Renewed
                                                    </p>
                                                    <p class="card-text text-capitalize">
                                                    <div class=" pl-md-2"
                                                        style="height:150px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                        {!! $item->renewreport_comments !!}
                                                    </div>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form action="{{ route('renewreport.mail', $item->company_id) }}"
                                                                method="post"
                                                                {{$date->fiscal != $item->renewreport_fiscal ? 'show' : 'hidden' }}>
                                                                @csrf
                                                                <input type="submit" class="form-control btn-info badge-pill"
                                                                    value="Send Email">
                                                            </form>
                                                        </div>
                                                        <!-- Button trigger modal -->
                                                        <div class="col-md-6">
                                                            <button type="button"
                                                                class="form-control btn btn-primary badge-pill"
                                                                data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                                Status Change
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Status Change
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('renew.update', $item->id) }}" method="POST">
                                                                        @method('put')
                                                                        @csrf
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">Status</div>
                                                                            <div class="col-md-8">
                                                                                <select name="renewreport_status" class="form-control" id="">
                                                                                    <option value="notrenewed">Not Renewed</option>
                                                                                    <option value="Renewed">Renewed</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        Comments
                                                                        <textarea name="renew_comments" class="form-control" rows="3" cols="25"
                                                                            placeholder="Comments here.." required></textarea>
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
                        {{ $renew->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
