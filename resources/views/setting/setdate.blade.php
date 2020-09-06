@extends('dashboard')
@include('sidemenu')
@section('title')
    Set Date
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Set Date</div>
            <div class="card-body">
                <form action="{{ route('setdate.store') }}" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            Fiscal Year
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="" name="fiscal" id="fiscal" placeholder="YYYY"
                                required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">Audit Date</div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nepali-datepicker-1" name="audit_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Renew Date
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nepali-datepicker" name="renew_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            Report Date
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nepali-datepicker-2" name="report_date"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2"><input type="submit" class="btn btn-success" value="Set"></div>
                    </div>
                </form>
                <table class="table table-responsive table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Fiscal Year</th>
                            <th scope="col">Audit Date</th>
                            <th scope="col">Renew Date</th>
                            <th scope="col">Report Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($setdate)
                            @foreach ($setdate as $item)
                                <tr>
                                    <td>{{ $item->fiscal }}</td>
                                    <td>{{ $item->audit_date }}</td>
                                    <td>{{ $item->renew_date }}</td>
                                    <td>{{ $item->report_date }}</td>
                                    <td>
                                        <a href="{{ route('setdate.edit', $item->id) }}">
                                            <button type="button" class="btn btn-primary" data-toggle="collapse"
                                                data-target="#comments">Edit</button></a>


                                    </td>

                                </tr>

                            @endforeach

                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
