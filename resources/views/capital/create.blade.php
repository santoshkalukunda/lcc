@extends('dashboard')
@section('title')
    Capital
@endsection
@section('content')
    <x-company-sidebar :id="$company_id"></x-company-sidebar>
    <div class="col-md-12">
        @if (Session::has('success'))
        <div class="bg-success text-white p-2">
            {{ Session::get('success') }}
        </div>
    @endif
        <div class="card">
            <div class="card-header">Capital</div>
            <div class="card-body">
            <form action="{{route('capital.store')}}" method="post"  {{$capital->count()==0 ?"show":"hidden"}}>
                    @csrf
                    <input type="text" name="company_id" id="" value="{{$company_id}}" hidden >
                    <div class="row form-group">
                        <div class="col-md-1"><label for="maximum">Authorized<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" class="form-control" name="maximum" id="maximum"
                                placeholder="Authorized Capital" autofocus min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="release">Issued<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" class="form-control" name="release" id="release"
                                placeholder="Issued Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="clearance">Paid Up<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" class="form-control" name="clearance" id="clearance"
                                placeholder="Paid Up Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"> <input type="submit" class="form-control btn-success  rounded-pill"
                                value="Save"></div>
                    </div>
                </form>
                @isset($capital)
                @foreach ($capital as $item)
                <ul class="list-group list-group-flush font-17">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 font-bold">Authorized</div>
                            <div class="col-md-4 text-capitalize">{{$item->maximum }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 font-bold">Issued</div>
                            <div class="col-md-4">{{$item->release }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 font-bold">Paid Up</div>
                            <div class="col-md-4">{{$item->clearance}}</div>
                        </div>
                        <hr>
                    </li>
                    <div class="row form-group">
                        <div class="col-md-2 mt-2">
                            <a href="{{ route('capital.edit', $item->id) }}"><button class="btn btn-info rounded-pill form-control"><i class="fa fa-edit" data-toggle="tooltip"
                                data-placement="bottom" title="Edit"> Edit</i></button></a>
                        </div>
                        <div class="col-md-2 mt-2">
                            <form method="post" action="{{ route('capital.destroy', $item->id) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger rounded-pill form-control" type="submit"
                                    onclick="return confirm('Are you sure to delete?')"><i
                                        class="fa fa-trash" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"> Delete</i></button>
                            </form>
                        </div>
                    </div>
                </ul>
                @endforeach
                @endisset
            </div>
        </div>
    </div>


@endsection
