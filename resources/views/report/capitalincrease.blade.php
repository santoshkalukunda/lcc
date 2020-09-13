@extends('dashboard')
@include('sidemenu')
@section('title')
Capital Increase
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Capital Increase</div>
            <b class="text-right mr-2">Total Result: {{$count}} </b>
            <div class="card-body">
                <div class="col-md-8 mb-2">
                    <form action="{{ route('company-capitalincrease-search') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-group col-md-12">
                                <input type="text" id="company-search-input" name="search" class="form-control badge-pill "
                                    list="suggestions-data-list" placeholder="Search" aria-label="Search Company"
                                    aria-describedby="search">
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
                <div class="row">
                    @isset($search)
                        @foreach ($search as $item)
                            <div class="col-md-3">
                                <a href="{{ route('capital.edit', $item->id) }}" class="text-decoration-none text-dark">
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
