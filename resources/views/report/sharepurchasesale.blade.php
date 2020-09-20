@extends('dashboard')
@include('sidemenu')
@section('title')
शेयर खरिद बिक्री
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">शेयर खरिद बिक्री</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <form action="{{ route('company-sherepurchasesele-search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="input-group col-md-12">
                                    <input type="text" id="company-search-input" name="search"
                                        class="form-control badge-pill " list="suggestions-data-list" placeholder="Search"
                                        aria-label="Search Company" aria-describedby="search" autofocus>
                                    <datalist id="suggestions-data-list">
                                    </datalist>
                                    <div class="input-group-append">

                                        <span id="search">
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fa fa-search"></i></button></span>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <b class="col-md-4 text-right">Total Results: {{ $count }} </b>
                </div>
                <hr>
                <div class="row">
                    @if ($count == null)
                               <div class=" ml-md-3 text-danger">{{ "Result not found." }}</div> 
                            @endif
                    @isset($search)
                        @foreach ($search as $item)
                            <div class="col-md-3">
                                <a href="{{ route('shareholder.show', $item->id) }}" class="text-decoration-none text-dark">
                                    <div class="card-slip">
                                        <div class="card mb-3" style="max-width: 20rem;">
                                            <div class="card-header font-bold">{{ $item->name }}</div>
                                            <div class="card-body">
                                                <p class="card-text">{{ $item->address }}</p>
                                                <p class="card-text">{{ $item->contact_no }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endisset
                </div>

            </div>
        </div>

    </div>

@endsection
