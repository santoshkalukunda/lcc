@extends('layouts.app')
@section('title')
    Company Name Change Report
@endsection
@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Company Name change Report</div>
            <div class="card-body">
                <form action="{{ route('namechange.search') }}" method="POST">
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-3 form-group">
                            Name<input type="text" class="form-control" name="name" id="name" placeholder="Company Name">
                        </div>

                        <div class="col-md-2 form-group">
                            Status<select name="status" id="" class="form-control">
                                <option value="">All</option>
                                <option value="incomplete">Incomplete</option>
                                <option value="complete">Complete</option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            Days<select name="operation" id="" class="form-control">
                                <option value="">All</option>
                                <option value="=">Equal</option>
                                <option value="<">Greater</option>
                                <option value=">">Less</option>
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <input type="number" class="form-control" name="days" placeholder="Enter Days">
                        </div>
                        <div class="col-md-2 mt-4">
                            <input type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </div>
                </form>
                <table class="table table-responsive table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Change Date</th>
                            <th scope="col">Days</th>
                            <th scope="col">Old Name</th>
                            <th scope="col">New Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($namechange)
                            @foreach ($namechange as $item)
                         
                                <tr>

                                    <td>{{ $item->change_date }}</td>

                                    <td><?php
                                        $date1 = date_create("$item->change_date");
                                        $date2 = date_create(date('yy-m-d'));
                                        $diff = date_diff($date1, $date2);
                                        $d = $diff->format('%a days');
                                        echo $d;
                                        ?>
                                    </td>
                                    <td>{{ $item->old_name }}</td>
                                    <td>{{ $item->new_name }}</td>
                                    <td> {{ $item->status }}
                                    <td>
                                        <form action="{{ route('namechange.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            @if ($item->status == 'incomplete')
                                                <input type="text" value="complete" name="status" hidden>
                                            @else
                                                <input type="text" value="incomplete" name="status" hidden>
                                            @endif
                                            <input type="submit" class="btn btn-primary" value="Change Status">
                                        </form>
                                    </td>

                                </tr>

                            @endforeach

                        @endisset

                    </tbody>

                </table>
                {{ $namechange->links() }}
            </div>
        </div>
    </div>

@endsection
