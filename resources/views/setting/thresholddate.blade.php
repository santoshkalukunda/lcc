@extends('dashboard')
@include('sidemenu')
@section('title')
    Set Threshold Date
@endsection
@section('content')
    @php
    if ($thresholddate ==null) {
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
            <div class="card-header">Threshold Date</div>
            <div class="card-body">

                <form action="{{ route('thresholddate.store') }}" method="post" {{ $display }}>
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-3">
                            <input type="text" id="nepali-datepicker" name="audit_date" required
                                placeholder="Audit Date YYYY-MMM-DD" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="nepali-datepicker-1" name="renew_date" required
                                placeholder="Renew Date YYYY-MMM-DD" class="form-control">

                        </div>
                        <div class="col-md-2"><input type="submit" class="btn btn-success form-control" value="Set"></div>
                    </div>
                </form>
                @isset($thresholddate)


                    <table class="table table-responsive table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Audit Date</th>
                                <th scope="col">Renew Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $thresholddate->audit_date }}</td>
                                <td>{{ $thresholddate->renew_date }}</td>
                                <td>
                                    <a href="{{ route('thresholddate.edit', $thresholddate->id) }}">
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
