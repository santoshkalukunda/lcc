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
                                <div class="col-md-5">
                                    <input type="text" id="nepali-datepicker" name="change_date" required
                                        placeholder="Change Date (YYYY-MM-DD)"
                                        class="form-control @error('change_date')is-invalid @enderror">
                                    @error('change_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" name="new_name" id="date"
                                        class="form-control @error('new_name') is-invalid @enderror" required
                                        placeholder="New Company Name">
                                    @error('new_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-3 form-group">
                                    <input class="btn btn-primary badge-pill" type="submit" value="Change">

                                    <input class="btn btn-danger badge-pill" type="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                        <table class="table table-responsive table-hover mt-3">
                            <thead>

                                <tr>
                                    <th scope="col">Change Date</th>
                                    <th scope="col">Old Name</th>
                                    <th scope="col">New Name</th>
                                    <th scope="col">Remainig Days</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>


                            </thead>
                            <tbody>
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
                                        <tr>
                                            <td>{{ $item->change_date }}</td>
                                            <td>{{ $item->old_name }}</td>
                                            <td>{{ $item->new_name }}</td>
                                            <td>
                                                @if ($remain >= 0)
                                                    {{ $remain }}
                                                @else
                                                    {{ abs($remain) . ' Late' }}
                                                @endif
                                            </td>
                                            <td
                                                class=" text-capitalize {{ $item->status == 'incomplete' ? 'bg-danger' : 'bg-info' }} ">
                                                {{ $item->status }}
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary fa fa-comment" data-toggle="modal"
                                                    data-target="#exampleModal{{ $item->id }}">
                                                    Comments
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
                                                                                rows="5" required>
                                                                                          </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <input type="submit" class="btn btn-success mt-1 ml-4"
                                                                            value="Comments">
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ route('namechange.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('Are you sure to delete?')"><i
                                                            class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                            title="Delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                @endisset
                            </tbody>
                        </table>
                        {{ $namechange->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
