@extends('dashboard')
@section('title')
    Edit Capital
@endsection
@section('content')
    <x-company-sidebar :id="$capital->company_id"></x-company-sidebar>
    <div class="col-md-12">
        @if (Session::has('success'))
        <div class="bg-success text-white p-2">
            {{ Session::get('success') }}
        </div>
    @endif
        <div class="card">
            <div class="card-header">Edit Capital</div>
            <div class="card-body">
            <form action="{{route('capital.update',$capital->id)}}" method="post">
                @method('put')
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-1"><label for="maximum">Maximum<span class=" color-red">*</span></label></div>
                    <div class="col-md-5"><input type="number" id="number" value="{{$capital->maximum}}" class="form-control" name="maximum" id="maximum"
                                placeholder="maximum Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="release">Release<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number" value="{{$capital->release}}" class="form-control" name="release" id="release"
                                placeholder="Release Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="clearance">Clearance<span class=" color-red">*</span></label></div>
                        <div class="col-md-5"><input type="number"  value="{{$capital->clearance}}"class="form-control" name="clearance" id="clearance"
                                placeholder="Clearance Capital" min="0"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"> <input type="submit" class="form-control btn-success  badge-pill"
                                value="Update"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
