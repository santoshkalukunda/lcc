@extends('dashboard')
@section('title')
    Company Document
@endsection
@section('content')
<x-company-sidebar :id="$company_id"></x-company-sidebar>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Document </div>
                    <div class="card-body">
                        <table class="table table-sm table-responsive table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Old Name</th>
                                    <th scope="col">New Name</th>
                                    <th scope="col">Days</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @isset($namechange)
                                    @foreach ($namechange as $item)

                                        <tr>

                                            <td>{{ $item->change_date }}</td>

                                            <td>{{ $item->old_name }}</td>
                                            <td><a
                                                    href="{{ route('company.show', $item->company_id) }}">{{ $item->new_name }}</a>
                                            </td> 
                                            <td><?php
                                                $date1 = date_create("$item->change_date");
                                                $date2 = date_create(date('yy-m-d'));
                                                $diff = date_diff($date1, $date2);
                                                $d = $diff->format('%a days');
                                                echo $d;
                                                ?>
                                            </td>
                                            <td> {{ $item->status }}</td>
                                            <td>
                                                <div
                                                    style="height:150px;width:200px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                    {!! $item->comments !!}
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('namechange.update', $item->id)=>'ajax' }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <label for="" class="ml-2 mr-2">Status</label> 
                                                        
                                                            <select name="status" id="status">
                                                                <option value="incomplete">Incomplete</option>
                                                                <option value="complete">Complete</option>
                                                            </select>
                                                       
                                                    </div>
                                                    <textarea name="comments" id="comments" class="form-control" rows="3" cols="35"  required>
                                                                  </textarea>
                                                    <input type="submit" class="btn btn-success mt-1" id="update_data">
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach

                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
