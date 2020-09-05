@extends('dashboard')
@section('title')
    Sharholder List
@endsection
@section('content')
<x-company-sidebar :id="$company_id"></x-company-sidebar>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                    <input type="submit" class="btn btn-primary badge-pill" value="New Shareholder">
                                </form>
                            </div>
                            <div class="col-md-9 text-right"><b>Total : {{ $count }}</b></div>
                        </div>

                        <div class="row mt-2">
                            @isset($shareholder)
                                @foreach ($shareholder as $item)
                                    <div class="col-md-3">
                                        <a href="{{ route('shareholder.edit', $item->id) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="card-slip">
                                                <div class="card border-hover mb-3" style="max-width: 20rem;">
                                                    <div class="card-header">Name : {{ $item->shareholder_name }}</div>
                                                    <div class="card-body ">
                                                        <p class="card-text">Address: {{ $item->shareholder_address }} </p>
                                                        <p class="card-text">Contact: {{ $item->shareholder_contact }} </p>
                                                        <p class="card-text">Email: {{ $item->shareholder_email }} </p>
                                                        <p class="card-text">No. of Share: {{ $item->shareholder_share }} </p>
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
