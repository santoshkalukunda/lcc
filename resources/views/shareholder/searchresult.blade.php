@extends('dashboard')
@include('sidemenu')
@section('title')
    Sharholder Search
@endsection
@section('content')
<link rel="stylesheet" href="../../css/style.css">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Shareholder Search</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('shareholder-search.result') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" id="shareholder-search-input" name="search" class="form-control badge-pill"
                                    placeholder="Search Shareholder" aria-label="Search Company" aria-describedby="search" autofocus>
                                <div class="input-group-append">
                                    <span id="search">
                                        <button type="submit" class="btn btn-secondary"><i
                                                class="fa fa-search"></i></button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 text-right font-bold">
                        Total Result : {{$search->total()}}
                    </div>
                </div>
                <hr>
                <div class="row mt-2">
                    @if ($search->total()== null)
                               <div class=" ml-md-3 text-danger">{{ "Result not found." }}</div> 
                            @endif
                    @isset($search)
                        @foreach ($search as $item)

                            <div class="col-md-3 mb-3">
                                <a href="{{ route('shareholder.view', $item->id) }}" class="text-decoration-none text-dark">
                                    <div class="card-slip">
                                        <div class="card" style="max-width: 24rem;">
                                            <div class="card-header font-bold">{{ $item->shareholder_name }}</div>
                                            <div class="card-body">
                                                <p class="card-text">{{ $item->shareholder_address }}</p>
                                                <p class="card-text">{{ $item->shareholder_contact }}</p>
                                                <p class="card-text">{{ $item->email }} </p>
                                                <hr>
                                                <p class="card-text text-center font-bold text-decoration"><u>Company Details</u></p>
                                                <p class="card-text font-bold">{{ $item->company->name }}</p>
                                                <p class="card-text">{{ $item->company->address }}</p>
                                                <p class="card-text">{{ $item->company->contact_no }}</p>
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
