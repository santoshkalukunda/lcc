@extends('dashboard')
@include('sidemenu')
@section('title')
    Company Name Change Report
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Company Name change Report </div>
            <div class="col-md-12 text-md-right"><b>Total Result: {{ $count }}</b> </div>
            <div class="card-body">
                <form action="{{ route('namechange.search') }}" method="POST">
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-3">
                            Name<input type="text" class="form-control" name="name" id="name" placeholder="Company Name">
                        </div>

                        <div class="col-md-2">
                                Status 
                                <select name=" status" id="" class="form-control">
                            <option value="">All</option>
                            <option value="incomplete">Incomplete</option>
                            <option value="complete">Complete</option>

                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            Days
                            <select name="operation" id="" class="form-control">
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
                <div class="row">
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
                            $color="#ccd8f1";
                            }
                            if ($day>10 && $item->status=="incomplete" ) {
                            $color="#81a6f1";
                            }
                            if ($day>20 && $item->status=="incomplete" ) {
                            $color="#e0d888";
                            }
                            if ($day>25 && $item->status=="incomplete" ) {
                            $color="#da8f8f";
                            }
                            @endphp
                                 <div class="col-md-4">
                                    <div class="card-slip">
                                        <div class="card mb-3" style="max-width: 27rem; background-color:{{ $color }}">
                                            <a href="{{ route('namechange.show', $item->company_id) }}" >
                                                <div class="card-header font-bold text-decoration-none" style="color:black;"onMouseOver="this.style.backgroundColor='#b5f5cc'"   onMouseOut="this.style.backgroundColor='{{ $color }}'">                                   
                                                    {{ $item->new_name }}</div>
                                            </a>
                                            <div class="card-body pt-0">
                                                <p class="card-text font-bold pt-0">{{ $item->contact_no }}</p>
                                                <p class="card-text font-bold text-capitalize">{{ $item->status }}</p>
                                                <p class="card-text font-bold font-20 ">
                                                    @if ($remain >= 0)
                                                        {{ $remain }}
                                                    @else
                                                        {{ abs($remain) . ' Late' }}
                                                    @endif
                                                </p>
                                                <p class="card-text text-capitalize">
                                                    <div style="height:150px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                    {!! $item->comments !!}
                                                </div>
                                                </p>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary fa fa-comment" data-toggle="modal"
                                                    data-target="#exampleModal{{ $item->id }}">
                                                    Comments
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Change Status
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
    
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('namechange.update', $item->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">Status</div>
                                                                        <div class="col-md-8">
                                                                            <select name="status" class="form-control" id="">
                                                                                <option value="incomplete">Incomplete</option>
                                                                                <option value="complete">Complete</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    Comments
                                                                    <textarea name="comments" class="form-control" rows="3" cols="35" required>
                                                                                                      </textarea>
                                                                    <input type="submit" class="btn btn-success mt-1">
                                                                </form>
    
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>


                        @endforeach

                    @endisset
                </div>
                {{ $namechange->links() }}
            </div>
        </div>


    @endsection
