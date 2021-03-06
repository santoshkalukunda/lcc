@extends('dashboard')
@section('title')
    Sharholder List
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
                    <div class="card-header">Shareholder </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2">
                                <form action="{{ route('shareholder.create') }}" method="GET">
                                    <input type="text" name="id" value="{{ $company_id }}" hidden>
                                    {{--<a
                                        href="{{ route('shareholder.create', $company_id) }}"><i
                                            class="fa fa-plus btn btn-primary"> Add</i> </a>--}}
                                    <input type="submit" class="btn btn-primary form-control rounded-pill mb-2" value="New Shareholder">
                                </form>

                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('document.show', $company_id) }}" class="btn btn-info form-control mb-2 rounded-pill">Next</a>
                            </div>
                            <div class="col-md-7">
                                <form action="{{ route('shareholder.search.list') }}" method="post">
                                    @csrf
                                    <input type="text" name="company_id" value="{{ $company_id }}" hidden>
                                    <div class="input-group">
                                        <input type="text" id="shareholder-search-input" name="search"
                                            class="form-control rounded-pill" placeholder="Search Shareholder"
                                            aria-label="Search Company" aria-describedby="search" autofocus>
                                        <div class="input-group-append">
                                            <span id="search">
                                                <button type="submit" class="btn btn-secondary"><i
                                                        class="fa fa-search"></i></button></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                         
                            <div class=" col-md-2 text-right"><b>Total Results: {{ $count }}</b></div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            @isset($shareholder)
                                @foreach ($shareholder as $item)
                                    <div class="col-md-3">
                                        <a href="{{ route('shareholder.edit', $item->id) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="card-slip">
                                                <div class="card border-hover mb-3" style="max-width: 20rem;">
                                                    <div class="card-header font-bold">{{ $item->shareholder_name }}</div>
                                                    <div class="card-body ">
                                                        <p class="card-text">{{ $item->shareholder_address }} </p>
                                                        <p class="card-text">{{ $item->shareholder_contact }} </p>
                                                        <p class="card-text">{{ $item->email }} </p>

                                                        <a href="" class="text-right">
                                                            <form method="post"
                                                                action="{{ route('shareholder.destroy', $item->id) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm" type="submit"
                                                                    onclick="return confirm('Are you sure to delete?')"><i
                                                                        class="fa fa-trash" data-toggle="tooltip"
                                                                        data-placement="bottom" title="Delete"></i></button>
                                                            </form>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            @endisset

                        </div>
                        {{ $shareholder->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
