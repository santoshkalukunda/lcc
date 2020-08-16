@extends('layouts.app')
@section('title')
    Sharholder List
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <x-company-sidebar :id="$company_id"></x-company-sidebar>
            </div>
            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Shareholder</div>
                    <div class="card-body">
                        <form action="{{ route('shareholder.create') }}" method="GET">
                            <input type="text" name="id" value="{{ $company_id }}" hidden>
                            {{--<a href="{{ route('shareholder.create', $company_id) }}"><i
                                    class="fa fa-plus btn btn-primary"> Add</i> </a>--}}
                            <input type="submit" class="btn btn-primary" value="+ Add">
                        </form>
                        <div class="row mt-2">
                                    @isset($shareholder)
                                        @foreach ($shareholder as $item)
                                            <div class="col-4">
                                            <a href="{{ route('shareholder.edit', $item->id) }}" class="text-decoration-none">
                                                <div class="card border-info mb-3" style="max-width: 20rem;">
                                                    <div class="card-header">Name : {{ $item->name }}</div>
                                                    <div class="card-body text-info">
                                                        <p class="card-text">Address: {{ $item->address }} </p>
                                                        <p class="card-text">Contact: {{ $item->contact }} </p>
                                                        <p class="card-text">Email: {{ $item->email }} </p>
                                                        <p class="card-text">No. of Share: {{ $item->share }} </p>
                                                    </div>
                                                </div>
                                            </a>
                                            </div>
                                        @endforeach
                                        
                                    @endisset

                        </div>
                        {{$shareholder->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
