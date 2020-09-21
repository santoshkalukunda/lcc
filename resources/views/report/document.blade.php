@extends('dashboard')
@include('sidemenu')
@section('title')
सुरु विवरण
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">सुरु विवरण</div>
            <div class="row mt-md-3 ml-md-3 mr-md-3">
                <div class="col-md-2">
                <form action="{{route('alldocumentreport.mail')}}" method="post">
                        @csrf
                       <input type="submit" class="form-control btn-info badge-pill" data-toggle="tooltip"
                       data-placement="bottom" title="Send mail to status Incomplete all shareholders" value="Send Email">
                    </form>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('documentreport.search') }}" method="POST">
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-3 form-group">
                            Name<input type="text" class="form-control" name="name" id="name" placeholder="Company Name" autofocus>
                        </div>

                        <div class="col-md-2 form-group">
                            Status<select name="status" id="" class="form-control">
                                <option value="">All</option>
                                <option value="incomplete">Incomplete</option>
                                <option value="complete">Complete</option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            Remaining Days<select name="operation" id="" class="form-control">
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
                            <input type="submit" class="btn btn-primary badge-pill form-control" value="Search">
                        </div>
                    </div>
                </form>
                <b class="badge-pill bg-blue-light text-white font-18">Total Results: {{ $count }}</b>
                <b class=" float-right" style="color: #da8f8f"> *Lass Than 20 </b>
                <b class=" float-right" style="color: #e0d888"> *50-30 &nbsp </b>
                <b class=" float-right" style="color: #81a6f1"> *80-50 &nbsp </b>
                <b class=" float-right" style="color: #ccd8f1"> *90-80 &nbsp </b>
                <b class=" float-right" >Remaining days &nbsp</b>
                <hr>
                <div class="row">
                   
                        @if ($count == null)
                           <div class=" ml-md-3 text-danger">{{ "Result not found." }}</div> 
                        @endif
                    @isset($documentreport)
                        @foreach ($documentreport as $item)
                            @php
                            $color="white";
                            @endphp

                            @isset($current_date)
                                @php
                                $date1 = date_create($item->reg_date);
                                $date2 = date_create($current_date);
                                $diff = date_diff($date1, $date2);
                                $day =$diff->format('%a');
                                $lastday=90;
                                $remain=$lastday-$day;
                                if ($day>=10 && $item->status=="incomplete" ) {
                                $color="#ccd8f1";
                                }
                                if ($day>30 && $item->status=="incomplete" ) {
                                $color="#81a6f1";
                                }
                                if ($day>30 && $item->status=="incomplete" ) {
                                $color="#e0d888";
                                }
                                if ($day>70 && $item->status=="incomplete" ) {
                                $color="#da8f8f";
                                }
                                @endphp
                            @endisset
                            <div class="col-md-4">
                                <div class="card-slip">
                                    <div class="card mb-3" style="max-width: 27rem; background-color:{{ $color }}">
                                        <a href="{{ route('document.show', $item->company_id) }}">
                                            <div class="card-header font-bold text-decoration-none" style="color:black;" onMouseOver="this.style.backgroundColor='#b5f5cc'"   onMouseOut="this.style.backgroundColor='{{ $color }}'">
                                                {{ $item->name }}</div>
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text font-bold">{{ $item->contact_no }}</p>
                                            <p class="card-text font-bold text-capitalize">{{ $item->status }}</p>
                                            <p class="card-text font-bold font-20">
                                                @if ($item->status == 'incomplete')
                                                @if ($remain >= 0)
                                                    {{ $remain ." Days Remaining" }}
                                                @else
                                                    {{ abs($remain) . ' Days Late' }}
                                                @endif
                                            @endif
                                            </p>
                                            <p class="card-text text-capitalize">
                                                    <div class=" pl-md-2" style="height:150px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                
                                                {!! $item->comments !!}
                                            </div>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ route('documentreport.mail', $item->company_id) }}" method="post" {{ $item->status  != "complete" ? 'show' : 'hidden' }}>
                                                        @csrf
                                                       <input type="submit" class="form-control btn-info badge-pill" value="Send Email">
                                                    </form>
                                                </div>
                                                
                                                 <!-- Button trigger modal -->
                                                 <div class="col-md-6">
                                                    <button type="button" class="form-control btn btn-primary badge-pill"
                                                        data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                        Status Change
                                                    </button>
                                                 </div>
                                                    
                                            </div>
                                          
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Status Change
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('documentreport.edit', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">Status</div>
                                                                    <div class="col-md-8">
                                                                        <select name="status" class="form-control" id="">
                                                                            <option value="incomplete">Incomplete</option>
                                                                            <option value="complete">Complete</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <textarea name="comments" class="form-control" rows="5"
                                                                    cols="25" placeholder="Comments here.." required></textarea>
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
                @isset($documentreport)
                    {{ $documentreport->links() }}
                @endisset
            </div>
        </div>
    </div>



@endsection
