@extends('layouts.app')
@section('title')
    Sharholder Search
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Shareholder Search</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <form action="{{ route('shareholder-search.result') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" id="shareholder-search-input" name="search" class="form-control badge-pill"
                                    placeholder="Search Shareholder" aria-label="Search Company" aria-describedby="search">
                                <div class="input-group-append">
                                    <span id="search">
                                        <button type="submit" class="btn btn-secondary"><i
                                                class="fa fa-search"></i></button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
