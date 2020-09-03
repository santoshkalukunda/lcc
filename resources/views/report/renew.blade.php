@extends('layouts.app')
@section('title')
    Company Renew
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Renew</div>
                    <div class="card-body">
                    <form action="{{route('renew.search')}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-2">
                                    Company Name
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control" placeholder="Company Name">
                                </div>
                                <div class="col-md-1">
                                    Status
                                </div>
                                <div class="col-md-2">
                                    <select name="status" class="form-control" id="">
                                        <option value="">All</option>
                                        <option value="renewed">Renewed</option>
                                        <option value="not_renew">Not Renew</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-info" value="Search">
                                </div>
                            </div>
                        </form>

                        <table class="table table-responsive table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Company name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Last Renew Date</th>
                                    <th scope="col">Fiscal Year</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($renew)
                                    @foreach ($renew as $item)

                                        <tr>
                                            <td><a href="{{ route('renew.show', $item->company_id) }}">{{ $item->name }}</a></td>
                                            <td>{{$item->contact_no}}</td>
                                            <td>{{ $date->renew_date }}</td>
                                            <td>{{ $date->fiscal }}</td>
                                            <td>
                                                {{ $date->fiscal == $item->renewreport_fiscal ? '' : 'Not'}} Renewed
                                            </td>
                                            <td>
                                                <div style="height:120px;width:250px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                                    {!! $item->renewreport_comments !!}
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{route('renew.update',$item->id)}}" method="POST">
                                                    @method('put')
                                                    @csrf
                                             
                                              <textarea name="renew_comments" class="form-control" rows="3" cols="35" placeholder="Comments here.." required>
                                              </textarea>
                                              <input type="submit" class="btn btn-success mt-1">
                                              </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                @endisset
                            </tbody>
                        </table>
                        {{$renew->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
