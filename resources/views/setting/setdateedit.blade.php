@extends('dashboard')
@include('sidemenu')
@section('title')
    Set Date edit
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="bg-success text-white p-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header">Set Date Edit</div>
            <div class="card-body">
                <form action="{{ route('setdate.update', $setdate->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            Fiscal Year
                        </div>
                        <div class="col-md-2">
                            <select name="fiscal" id="fiscal" id="" class="form-control" required>
                               <option value="{{$setdate->fiscal}}">{{$setdate->fiscal}}</option>
                                @for ( $i =98; $i >10; $i--)
                                @php
                                   $j=$i;
                                @endphp
                                <option>20{{$i}}/0{{++$j}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-md-2"><input type="submit" class="btn btn-success" value="Set"></div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
