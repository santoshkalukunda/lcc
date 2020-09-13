@extends('dashboard')
@include('sidemenu')
@section('title')
    Set Fiscal Current Year
@endsection
@section('content')
@php
if ($setdate ==null) {
    $display="show";
}else {
    $display="hidden";
}
@endphp

    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Set Fiscal Current Year</div>
            <div class="card-body">

                        <form action="{{ route('setdate.store') }}" method="post" {{$display}}>
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-2">
                                    Fiscal Year
                                </div>
                                <div class="col-md-2">
                                    <select name="fiscal" id="fiscal" id="" class="form-control" required>
                                      <option value="">Select Fiscal</option>
                                        @for ($i = 98; $i > 10; $i--)
                                            @php
                                            $j=$i;
                                            @endphp
                                            <option>20{{ $i }}/0{{ ++$j }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"><input type="submit" class="btn btn-success" value="Set"></div>
                            </div>
                        </form>
                @isset($setdate)
                    <table class="table table-responsive table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Current Fiscal Year</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $setdate->fiscal }}</td>
                                <td>
                                    <a href="{{ route('setdate.edit', $setdate->id) }}">
                                        <button type="button" class="btn btn-primary" data-toggle="collapse"
                                            data-target="#comments">Change</button></a>


                                </td>

                            </tr>


                        </tbody>
                    </table>
                @endisset
            </div>
        </div>
    </div>
@endsection
