@extends('menu')
@section('title')
    Search Company
@endsection
@section('body')

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Company</div>
            <div class="card-body">
                <div class="row">
                    @if ($search)
                        @foreach ($search as $item)
                            <div class="col-4">
                            <a href="{{route('company.show',$item->id)}}" class="text-decoration-none">
                                    <div class="card border-info mb-3" style="max-width: 20rem;">
                                        <div class="card-header">{{ $item->name }}</div>
                                        <div class="card-body text-info">
                                            <p class="card-text">Address: {{ $item->address }}</p>
                                            <p class="card-text">Contact: {{ $item->contact_no }}</p>
                                            <p class="card-text">Reg. No.: {{ $item->reg_no }}</p>
                                            <p class="card-text">Total share: {{ $item->share }}</p>
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
