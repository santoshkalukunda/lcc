@extends('layouts.app')
@section('title')
    Sharholder Search
@endsection
@section('content')
<link rel="stylesheet" href="../../css/style.css">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Shareholder Search</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-8">
                        <form action="{{ route('shareholder-search.result') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" id="shareholder-search-input" name="search"
                                    class="form-control badge-pill" placeholder="Search Shareholder"
                                    aria-label="Search Company" aria-describedby="search">
                                <div class="input-group-append">
                                    <span id="search">
                                        <button type="submit" class="btn btn-secondary"><i
                                                class="fa fa-search"></i></button></span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row mt-2">
                    @isset($search)
                        @foreach ($search as $item)

                            <div class="col-md-4">
                                <a href="{{ route('shareholder.view', $item->id) }}" class="text-decoration-none text-dark">
                                    <div class="card-slip">
                                        <div class="card mb-3" style="max-width: 20rem;">
                                            <div class="card-header"> Name: {{ $item->shareholder_name }}</div>
                                            <div class="card-body">
                                                <p class="card-text">Address: {{ $item->shareholder_address }}</p>
                                                <p class="card-text">Contact: {{ $item->shareholder_contact }}</p>
                                                <p class="card-text">Email: {{ $item->shareholder_email }} </p>
                                                <p class="card-text">Comapany Name: {{ $item->company->name }}</p>
                                            </div>
                                        </div>
                                </a>
                            </div>
                    </div>
                    @endforeach

                @endisset
            </div>
            {{ $search->links() }}
        </div>
    </div>
    </div>
@endsection
