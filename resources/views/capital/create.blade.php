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
                        <div class="col-md-1"><label for="maximum">Maximum<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" class="form-control" name="maximum" id="maximum"
                                placeholder="maximum Capital" autofocus min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="release">Release<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" class="form-control" name="release" id="release"
                                placeholder="Release Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="clearance">Clearance<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" class="form-control" name="clearance" id="clearance"
                                placeholder="Clearance Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"> <input type="submit" class="form-control btn-success  badge-pill"
                                value="Save"></div>
                    </div>
                </form>
                <table class="table table-responsive table-hover mt-3" {{$capital->count()>0 ?"show":"hidden"}}>
                    <thead>
                        <tr>
                            <th scope="col">Maximun</th>
                            <th scope="col">Release</th>
                            <th scope="col">Clearance</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($capital)
                            @foreach ($capital as $item)
                               
                                    <tr>
                                        <td>{{$item->maximum }}</td>
                                        <td>{{$item->release }}</td>
                                        <td>{{$item->clearance}}</td>
                                        <td>
                                           <a href="{{ route('capital.edit', $item->id) }}"><i class="fa fa-edit btn btn-info data-toggle="tooltip"
                                            data-placement="bottom" title="Edit"></i></a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('capital.destroy', $item->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('Are you sure to delete?')"><i
                                                        class="fa fa-trash" data-toggle="tooltip"
                                                        data-placement="bottom" title="Delete"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                               
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection
