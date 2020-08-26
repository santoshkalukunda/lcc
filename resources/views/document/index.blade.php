@extends('layouts.app')
@section('title')
    Company Document
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-company-sidebar :id="$company_id"></x-company-sidebar>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Document </div>
                    <div class="card-body">
                        <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-5">
                                    <input class="form-control @error('file')is-invalid @enderror"  type= "file"
                                        name="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                                                            text/plain, application/pdf, image/*" required>
                                    @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                        <input type="hidden" name="company_id" value="{{ $company_id }}">
                                        <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" required placeholder=" Document Type">
                                        @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                
                                <div class="col-md-3 form-group">
                                    <input class="btn btn-primary badge-pill" type="submit" value="Upload">
                               
                                    <input class="btn btn-danger badge-pill" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                        <table class="table table-responsive table-hover mt-3">
                            <thead>

                                <tr>
                                    <th scope="col">Document Type</th>
                                    <th scope="col">Action</th>
                                </tr>


                            </thead>
                            <tbody>
                                @if ($document)
                                    @foreach ($document as $item)
                                        @if ($item->company_id == $company_id)
                                            <tr>

                                                <td><a href="{{ asset('storage/' . $item->file) }}"
                                                        target="_blank">{{ $item->type }}</a></td>
                                                <td>
                                                    <form method="post" action="{{ route('document.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm" type="submit"
                                                            onclick="return confirm('Are you sure to delete?')"><i
                                                                class="fa fa-trash" data-toggle="tooltip"
                                                                data-placement="bottom" title="Delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
