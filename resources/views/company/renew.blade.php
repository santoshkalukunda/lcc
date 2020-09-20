@extends('dashboard')
@section('title')
    Company Renew report
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
                    <div class="card-header">Renew report</div>
                    <div class="card-body">
                        @isset($renew)
                            @foreach ($renew as $item)
                                <div class="row">
                                    <div
                                        class="col-md-12 font-bold text-center font-18 {{ $currentdate == $item->renewreport_fiscal ? '' : 'bg-danger' }} bg-info ">
                                        Status : {{ $currentdate == $item->renewreport_fiscal ? '' : 'Not' }} Renewed</div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-2">Comments</div>
                                    <div class="col-md-12">
                                        <div class="pl-md-2"
                                            style="height:180px; border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                            {!! $item->renewreport_comments !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-md-2">
                                    <div class="col-md-2">
                                        <form action="{{ route('renewreport.mail', $item->company_id) }}" method="post"
                                            {{ $currentdate == $item->renewreport_fiscal ? 'hidden' : 'show' }}>
                                            @csrf
                                            <input type="submit" class="btn btn-info form-control badge-pill" value="Send Email">
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <form action="{{ route('renew.update', $item->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-md-1">Status</div>
                                        <div class="col-md-3">
                                            <select name="renewreport_status" class="form-control" id="">
                                                <option value="notrenewed">Not Renewed</option>
                                                <option value="Renewed">Renewed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <textarea name="renew_comments" class="form-control" rows="5" placeholder="Comments here.." required></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-success form-control  badge-pill">
                                        </div>
                                        
                                    </div>
                                </form>

                            @endforeach

                        @endisset



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
