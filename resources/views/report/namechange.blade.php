@extends('dashboard')
@include('sidemenu')
@section('title')
    Company Name Change Report
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Company Name change Report </div>
            <div class="col-md-12 text-md-right"><b>Total Result: {{$count}}</b> </div>
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
                                <option value=">">Greater</option>
                                <option value="<">Less</option>
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
                
                <table class="table table-responsive-md  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Change Date</th>
                            <th scope="col">Old Name</th>
                            <th scope="col">New Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Remaining Days</th>
                            <th scope="col">Status</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($namechange)
                            @foreach ($namechange as $item)
                            @php
                                        $date1 = date_create("$item->change_date");
                                        $date2 = date_create($currentdate);
                                        $diff = date_diff($date1, $date2);
                                        $day = $diff->format('%a');
                                        $last=30;
                                        $remain=$last-$day;
                                        $color="default";
                                        if ($day>=0 && $item->status=="incomplete" ) {
                                            $color="table-secondary";
                                        }
                                        if ($day>10 && $item->status=="incomplete" ) {
                                            $color="table-info";
                                        }
                                        if ($day>20 && $item->status=="incomplete" ) {
                                            $color="table-warning";
                                        }
                                        if ($day>25 && $item->status=="incomplete" ) {
                                            $color="table-danger";
                                        }

                            @endphp
                           
                             
                                     <tr class="{{$color}}">
                                    <td>{{ $item->change_date }}</td>

                                    <td>{{ $item->old_name }}</td>
                                    <td><a href="{{ route('namechange.show', $item->company_id) }}">{{ $item->new_name }}</a></td>
                                    <td>{{ $item->company->contact_no }}</td>
                                    <td>
                                        @if ($remain>=0)
                                        {{$remain}} 
                                        @else
                                        {{abs($remain)." Late"}}  
                                        @endif
                                        
                                    </td>
                                    <td> {{ $item->status }}</td>
                                    <td>
                                        <div
                                            style="height:150px;width:230px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                            {!! $item->comments !!}
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="collapse"
                                            data-target="#{{ 'comments' . "$item->id" }}">Comments</button>

                                        <div id="{{ 'comments' . "$item->id" }}" class="collapse">
                                            <form action="{{ route('namechange.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-md-4">Status</div>
                                                    <div class="col-md-8">
                                                        <select name="status" class="form-control" id="">
                                                            <option value="incomplete">Incomplete</option>
                                                            <option value="complete">Complete</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <textarea name="comments" class="form-control" rows="3" cols="35" required>
                                                                          </textarea>
                                                <input type="submit" class="btn btn-success mt-1">
                                            </form>

                                        </div>


                                    </td>

                                </tr>
                                

                            @endforeach

                        @endisset

                    </tbody>

                </table>
                {{ $namechange->links() }}
            </div>
        </div>
   

    @endsection
