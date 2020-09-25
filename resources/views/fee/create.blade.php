@extends('dashboard')
@section('title')
    Fee add
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
                    <div class="card-header">Fee add</div>
                    <div class="card-body">
                        <form action="{{ route('fee.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <div class="row form-group">
                                <div class="col-md-2"><label for="date">Date</label></div>
                                <div class="col-md-4 mt-2">
                                    <input class="form-control @error('date')is-invalid @enderror" type="text" id="nepali-datepicker" name="date" placeholder="Date YYYY-MM-DD" required>
                                    @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">Particulars</div>
                                <div class="col-md-4 mt-2">
                                
                                    <input name="particulars" class="form-control @error('particulars') is-invalid @enderror" placeholder="Particulars" required>
                                    @error('particulars')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">Amount</div>
                                <div class="col-md-4 mt-2">
                                    <input type="text" min="0" name="amount" class="form-control text-right @error('amount') is-invalid @enderror" placeholder="Amount Rs." required>
                                   
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">Status</div>
                                <div class="col-md-4 mt-2">
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <option value="ramaining">Ramaining</option>
                                    <option value="received">Received</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-2 mt-2">
                                    <input class="btn btn-primary form-control badge-pill" type="submit" value="Add">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



























