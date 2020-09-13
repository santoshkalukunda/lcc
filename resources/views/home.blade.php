@extends('dashboard')
@include('sidemenu')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('company.create') }}">
                            <div class="card-slip">
                                <div class="ibox bg-primary  color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">नयाँ कम्पनि दर्ता</h4>
                                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-slip">
                            <div class="ibox bg-success color-white widget-stat">
                                <div class="ibox-body">
                                    <h4 class="m-b-5 font-strong">जम्मा कम्पनि</h4>
                                    <div class="m-b-5">{{ $company }}</div>
                                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('documentreport.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-info color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">सुरु विवरण</h4>
                                        <div class="m-b-5">Incomplete : {{ $documentincomplete }}</div>
                                        <div class="m-b-5">Complete : {{ $documentcomplete }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('audit.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-warning color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">लेखा परिक्षण</h4>
                                    <div class="m-b-5">Not Audited {{$notaudited }}</div>
                                    <div class="m-b-5">Audited {{$audited }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('renew.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-purple color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">वार्षिक अध्यावधिक</h4>
                                    <div class="m-b-5">Not Renewed {{$notrenewed}}</div>
                                    <div class="m-b-5">Renewed {{$renewed}}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('namechange.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-danger color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">नाम परिवर्तन</h4>
                                        <div class="m-b-5">Incomplete {{ $namechangeincomplete }}</div>
                                        <div class="m-b-5">Complete {{ $namechangecomplete }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
