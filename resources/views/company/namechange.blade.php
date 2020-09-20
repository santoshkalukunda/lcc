@extends('dashboard')
@section('title')
    Company Namechange
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
                    <div class="card-header">Name Change</div>
                    <div class="card-body">
                        <form action="{{ route('namechange.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <div class="row form-group">
                                <div class="col-md-3 mt-2">
                                    <input type="text" id="nepali-datepicker" name="change_date" required
                                        placeholder="Change Date (YYYY-MM-DD)"
                                        class="form-control @error('change_date')is-invalid @enderror">
                                    @error('change_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-5 mt-2">
                                    <input type="text" name="new_name" id="date"
                                        class="form-control @error('new_name') is-invalid @enderror" required
                                        placeholder="New Company Name">
                                    @error('new_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-2 mt-2">
                                    <input class="btn btn-primary form-control badge-pill" type="submit" value="Change">
                                </div>
                                <div class="col-md-2 mt-2">
                                    <input class="btn btn-danger form-control  badge-pill" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                        <hr>
                        @isset($namechange)
                            @foreach ($namechange as $item)
                                @php
                                $date1 = date_create("$item->change_date");
                                $date2 = date_create($currentdate);
                                $diff = date_diff($date1, $date2);
                                $day = $diff->format('%a');
                                $last=30;
                                $remain=$last-$day;
                                @endphp
                                <div class="col-md-5">
                                    <div class="card-slip">
                                        <div class="card border-hover mb-3" style="max-width: 30rem;">
                                            <div class="card-header font-bold">{{ $item->new_name }}</div>
                                            <div class="card-body font-bold ">
                                                <p class="card-text">Change date: {{ $item->change_date }}</p>
                                                <p class="card-text">Old name: {{ $item->old_name }}</p>
                                                <p class="card-text">Remainig Days:
                                                    @if ($item->status == 'incomplete')
                                                        @if ($remain >= 0)
                                                            {{ $remain }}
                                                        @else
                                                            {{ abs($remain) . ' Late' }}
                                                        @endif
                                                    @endif
                                                </p>
                                                <p class="card-text">Status: <button
                                                        class=" text-capitalize badge-pill font-bold {{ $item->status == 'incomplete' ? 'btn btn-danger' : 'btn btn-info' }}" aria-readonly>
                                                        {{ $item->status }}
                                                    </button>
                                                </p>
                                                
                                                <p class="card-text col-md-12">
                                                <form action="{{ route('namechange.mail', $item->company_id) }}" method="post"
                                                    {{ $item->status != 'complete' ? 'show' : 'hidden' }}>
                                                    @csrf
                                                    <input type="submit" class="form-control btn-info badge-pill" value="Send E-mail">
                                                </form>
                                                </p>
                                                <p class="card-text">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary form-control badge-pill"
                                                        data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                        Change Status
                                                    </button>
                                                    <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <form action="{{ route('namechange.update', $item->id) }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div class="row form-group">
                                                                        <div class="col-md-2">Status</div>
                                                                        <div class="col-md-4">
                                                                            <select name="status" class="form-control" id="">
                                                                                <option value="incomplete">Incomplete</option>
                                                                                <option value="complete">Complete</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-12">
                                                                            Comments
                                                                            <textarea name="comments" class="form-control"
                                                                                rows="5" placeholder="Comment here..."
                                                                                required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <input type="submit"
                                                                            class="btn btn-success mt-md-1 ml-4 badge-pill">
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                </p>
                                                <p class="card-text">
                                                    <form method="post" action="{{ route('namechange.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger col-md-12 badge-pill" type="submit"
                                                            onclick="return confirm('Are you sure to delete?')"><i
                                                                class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                                title="Delete"> Delete</i></button>
                                                    </form>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach

                        @endisset
                        {{ $namechange->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
