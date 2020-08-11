@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-header">Manu</div>
                <div class="card-body">
                <ul class="nav nav-tabs">
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-university ">Company Info </i> </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('company.create')}}"> <i class="fa fa-plus-square-o"> Add</i></a>
                    <a class="dropdown-item" href="{{route('company.index')}}"><i class="fa fa-list">  List</i></a>
                    </div>
                </ul>
                </div>
                
            </div>

        </div>
        
        @yield('body')
    </div>
</div>
@endsection


