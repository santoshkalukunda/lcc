@extends('dashboard')
@section('title')
    Fee
@endsection
@section('content')
    <x-company-sidebar :id="$company_id"></x-company-sidebar>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Fee</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <form action="{{route('fee.create')}}" method="get">
                                    @csrf
                                        <input type="hidden" name="company_id" value="{{ $company_id }}">
                                     <button type="submit" class=" btn btn-info fa fa-plus badge-pill p-2">Add New</button>
                                    </form>
                            </div>
                            <div class="col-md-3 font-bold text-white">
                                <span class=" bg-info badge-pill p-2">
                                    Total Amount:
                                    @php
                                        $total=0;
                                        foreach ($fee as $item){
                                            $total=$total+$item->amount;
                                        }
                                        echo $total;
                                    @endphp
                                </span>
                            </div>
                            <div class="col-md-2 font-bold text-white">
                                <span class=" bg-info badge-pill p-2">
                                    Received:
                                    @php
                                        $received=0;
                                    
                                        foreach ($fee as $item){
                                            if ($item->status == "received") {
                                                $received=$received+$item->amount;
                                            } 
                                        }
                                        echo $received;
                                    @endphp
                                </span>
                            </div>
                            <div class="col-md-2">
                            <span class=" bg-info badge-pill font-bold text-white p-2">Remaining: {{$total-$received}}</span>
                            </div>
                            <div class="col-md-3 text-right font-bold text-white">
                            <span class=" bg-info badge-pill text-right p-2">Total Results: {{$fee->count()}}</span>
                            </div>
                        </div>
                 
                        <hr>
                        @isset($fee)
                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Particulars</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    @foreach ($fee as $item)
                                            <tr>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->particulars}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>{{$item->status}}</td>
                                            <td><a href="{{route('fee.edit',$item->id)}}" class="btn btn-info btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"><i class="fa fa-edit btn-info" ></i></a></td>
                                            <td>
                                                    <form method="post" action="{{ route('fee.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm" type="submit"
                                                            onclick="return confirm('Are you sure to delete?')"><i
                                                                class="fa fa-trash" data-toggle="tooltip"
                                                                data-placement="bottom" title="Delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                     
                                    @endforeach
                                
                            </tbody>
                        </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
