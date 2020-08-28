@extends('layouts.app')
@section('title')
Document Report Dashboard
@endsection

@section('content')

<div class="col-md-10">
    @include('report.currentdate')
    <div class="card">
        <div class="card-header">Document Report</div>
        <div class="card-body">
            <script type="text/javascript">
                console.log(NepaliFunctions.GetCurrentBsDate());
            </script>
            <form action="{{ route('documentreport.search') }}" method="POST">
                @csrf
                <div class="row form-group">

                    <div class="col-md-3 form-group">
                        <input
                        name="current_date"
                        type="text"
                        id="nepali-datepicker-1"
                        class="nepali-datepicker"
                        placeholder="Select Nepali Date"
                       hidden/>
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
                        <th scope="col">Company name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Days</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($documentreport)
                        @foreach ($documentreport as $item)
                            <tr>
                                <td><a href="{{ route('document.show', $item->id) }}">{{ $item->name}}</a></td>
                            <td>{{$item->contact_no}}</td>
                                <td>

                                    <?php
                                    if($current_date!=null)
                                    {
                                        $date1 = date_create($item->reg_date);
                                        $date2 = date_create($current_date);
                                        $diff = date_diff($date1, $date2);
                                        $d = $diff->format('%a days');
                                        echo $d;
                                    }
                                        ?>
                                </td>
                                <td>{{ $item->status}}</td>
                                <td><textarea  name="comment" rows="4" cols="50" disabled>{{ $item->comments }} 
                                 </textarea></td>
                                <td>     
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#comments">Change</button>
                                    <div id="comments" class="collapse">
                                    <form action="{{route('documentreport.edit',$item->id)}}" method="POST">
                                        @csrf
                                      status
                                  <select name="status" id="">
                                      <option value="incomplete">In-Complete</option>
                                      <option value="complete">Complete</option>
                                  </select>
                                  <br>
                                  comment
                                  <textarea name="comments" rows="3" cols="30" required>
                                  </textarea>
                                  <input type="submit" class="btn btn-success">
                                  </form>
                                    </div>
                                  </div>
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




