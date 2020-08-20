@extends('layouts.app')
@section('title')
    Sharholder List
@endsection
@section('content')
    <link rel="stylesheet" href="../../css/style.css">
    @isset($shareholder)
        @foreach ($shareholder as $item)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <x-company-sidebar :id="$item->company_id"></x-company-sidebar>

                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Shareholder </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <form action="{{ route('shareholder.create') }}" method="GET">
                                            <input type="text" name="id" value="{{ $item->company_id }}" hidden>
                                            {{--<a
                                                href="{{ route('shareholder.create', $company_id) }}"><i
                                                    class="fa fa-plus btn btn-primary"> Add</i>
                                            </a>--}}
                                            <input type="submit" class="btn btn-primary badge-pill" value="New Shareholder">
                                        </form>
                                    </div>
                                </div>

                                <div class="row mt-2">

                                    <div class="col-4">
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
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @endisset
@endsection
