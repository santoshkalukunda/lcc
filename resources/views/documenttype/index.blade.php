@extends('dashboard')
@include('sidemenu')
@section('title')
    Documetn Type
@endsection
@section('content')
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="bg-success text-white p-2">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Document Type</div>

            <div class="card-body">
                <form action="{{ route('documenttype.store') }}" method="post">
                    @csrf

                    <div class="row form-group">
                        <div class="col-md-4 mt-2"><input type="text" class="form-control text-capitalize" name="type"
                                id="type" placeholder="Document Type" required autofocus></div>

                        <div class="col-md-2 mt-2">
                            <input type="submit" class="form-control btn btn-success rounded-pill" value="Add">
                        </div>

                    </div>
                </form>
                <hr>
                <table class=" table-responsive" >   
                    @isset($documenttype)
                        @foreach ($documenttype as $item)
                              <tr>
                               
                                    <td>
                                     {{ $item->type }}</td>
                                    <td> 
                                      <a href="{{ route('documenttype.edit', $item->id) }}" class=" ml-md-5">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit" data-toggle="tooltip"
                                                    data-placement="bottom" title="Edit"></i></button></a>
                                    </td>
                                   <td>
                                        <form method="post" action="{{ route('documenttype.destroy', $item->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"
                                                    data-toggle="tooltip" data-placement="bottom" title="Delete"></i></button>
                                        </form>
                                   </td>

                              
                              </tr>
                        @endforeach

                    @endisset
                
                </table>
            </div>
        </div>
    </div>

@endsection
