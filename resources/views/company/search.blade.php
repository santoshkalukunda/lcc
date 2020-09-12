@extends('dashboard')
@include('sidemenu')
@section('title')
    Search Company
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Company</div>
            <b class="text-right mr-2">Total Result: {{$count}} </b>
            <div class="card-body">
                <div class="row">
                    @if ($search)
                        @foreach ($search as $item)
                            <div class="col-md-3">
                                <a href="{{ route('company.show', $item->id) }}" class="text-decoration-none text-dark">
                                    <div class="card-slip">
                                        <div class="card mb-3" style="max-width: 20rem;">
                                            <div class="card-header font-bold">{{ $item->name }}</div>
                                            <div class="card-body">
                                                <p class="card-text">{{ $item->address }}</p>
                                                <p class="card-text">{{ $item->contact_no }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $search->links() }}
            </div>
        </div>

    </div>

@endsection
