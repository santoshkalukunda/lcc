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
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">100</h2>
                            <div class="m-b-5">Total Company</div><i class="fa fa-university widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">1250</h2>
                            <div class="m-b-5">सुरु विवरण</div><i class="fa fa-file-alt widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">$1570</h2>
                            <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">108</h2>
                            <div class="m-b-5">नाम परिवर्तन</div><i class="fa fa-address-card widget-stat-icon"></i>
                            <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                        </div>
                    </div>
                </div>
            </div>


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>
</div>

@endsection




