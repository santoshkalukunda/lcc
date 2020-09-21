@extends('dashboard')
@include('sidemenu')
@section('title')
  LCC | Dashboard
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('company.create') }}">
                            <div class="card-slip">
                                <div class="ibox bg-primary  color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">नयाँ कम्पनि दर्ता</h4>
                                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                                        <div><i class="fa fa-level-up m-r-5"></i><small></small></div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="card-slip">
                            <div class="ibox bg-success color-white widget-stat">
                                <div class="ibox-body ">
                                    <h4 class="m-b-5 font-strong text-white">जम्मा कम्पनि</h4>
                                    <div class="m-b-5 text-white">{{ $company->total() }}</div>
                                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('documentreport.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-info color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">सुरु विवरण</h4>
                                        <div class="m-b-5">Incomplete : {{ $documentincomplete->total() }}</div>
                                        <div class="m-b-5">Complete : {{ $documentcomplete }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('audit.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-warning color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">लेखा परिक्षण</h4>
                                        <div class="m-b-5">Not Audited {{ $notaudited->total() }}</div>
                                        <div class="m-b-5">Audited {{ $audited }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('renew.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-purple color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">वार्षिक अध्यावधिक</h4>
                                        <div class="m-b-5">Not Renewed {{ $notrenewed->total() }}</div>
                                        <div class="m-b-5">Renewed {{ $renewed }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('namechange.index') }}">
                            <div class="card-slip">
                                <div class="ibox bg-danger color-white widget-stat">
                                    <div class="ibox-body">
                                        <h4 class="m-b-5 font-strong">नाम परिवर्तन</h4>
                                        <div class="m-b-5">Incomplete {{ $namechangeincomplete->total() }}</div>
                                        <div class="m-b-5">Complete {{ $namechangecomplete }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @isset($company)
                    <div class="col-md-6 list-group mt-3" {{$company->total() == null ? 'hidden': 'show'}}>
                        <span class=" p-md-3 font-15 font-bold badge-pill bg-blue-light text-white">Newly Registed
                            Company</span>
                        
                            @foreach ($company as $item)
                                <a href="{{ route('company.show', $item->id) }}"
                                    class="list-group-item list-group-item-action list-group-item-success  font-bold badge-pill">{{ $item->name . '  (' . $item->address . ')' }}
                                </a>
                            @endforeach
                        
                    </div>
                    @endisset
                    @isset($documentincomplete)
                    <div class="col-md-6 list-group mt-3" {{$documentincomplete->total() == null ? 'hidden': 'show'}}>
                        <span class="p-md-3 font-15 font-bold badge-pill bg-blue-light text-white">सुरु विवरण भर्न
                            बाँकी</span>
                        
                            @foreach ($documentincomplete as $item)
                                @php
                                $date1 = date_create($item->reg_date);
                                $date2 = date_create($currentdate);
                                $diff = date_diff($date1, $date2);
                                $day =$diff->format('%a');
                                $lastday=90;
                                $remain=$lastday-$day;
                                @endphp
                                <a href="{{ route('document.show', $item->company_id) }}"
                                    class="list-group-item list-group-item-action list-group-item-success  font-bold badge-pill">{{ $item->name . '   (' . $item->contact_no . ')' }}
                                    <span class="badge badge-primary badge-pill">
                                        @if ($item->status == 'incomplete')
                                            @if ($remain >= 0)
                                                {{ $remain . ' Days Remaining' }}
                                            @else
                                                {{ abs($remain) . ' Days Late' }}
                                            @endif
                                        @endif
                                    </span> </a>
                            @endforeach
                        
                    </div>
                    @endisset
                    @isset($notaudited)
                        <div class="col-md-6 list-group mt-3" {{$notaudited->total() == null ? 'hidden': 'show'}}>
                            <span class=" p-md-3 font-15 font-bold badge-pill bg-blue-light text-white">लेखा परिक्षण हुन
                                बाँकी</span>

                            @foreach ($notaudited as $item)
                                <a href="{{ route('audit.show', $item->company_id) }}"
                                    class="list-group-item list-group-item-action list-group-item-success  font-bold badge-pill">{{ $item->name . '  (' . $item->contact_no . ')' }}
                                </a>
                            @endforeach

                        </div>
                    @endisset
                    @isset($notrenewed)
                        <div class="col-md-6 list-group  mt-3" {{$notrenewed->total() == null ? 'hidden': 'show'}}>
                            <span class="p-md-3 font-15 font-bold badge-pill bg-blue-light text-white">वार्षिक अध्यावधिक हुन
                                बाँकी</span>

                            @foreach ($notrenewed as $item)
                                <a href="{{ route('renew.show', $item->company_id) }}"
                                    class="list-group-item list-group-item-action list-group-item-success  font-bold badge-pill">{{ $item->name . '  (' . $item->contact_no . ')' }}
                                </a>
                            @endforeach

                        </div>
                    @endisset
               
                    @isset($namechangeincomplete)
                        <div class="col-md-6 list-group mt-3"{{$namechangeincomplete->total() == null ? 'hidden': 'show'}} >
                            <span class="p-md-3 font-15 font-bold badge-pill bg-blue-light text-white">नाम परिवर्तन</span>
                           
                            @foreach ($namechangeincomplete as $item)
                                @php
                                $date1 = date_create("$item->change_date");
                                $date2 = date_create($currentdate);
                                $diff = date_diff($date1, $date2);
                                $day = $diff->format('%a');
                                $last=30;
                                $remain=$last-$day;
                                @endphp
                                <a href="{{ route('namechange.show', $item->company_id) }}"
                                    class="list-group-item list-group-item-action list-group-item-success  font-bold badge-pill">{{ $item->new_name }}
                                    <span class="badge badge-primary badge-pill">
                                        @if ($item->status == 'incomplete')
                                            @if ($remain >= 0)
                                                {{ $remain . ' Days Remaining' }}
                                            @else
                                                {{ abs($remain) . ' Days Late' }}
                                            @endif
                                        @endif
                                    </span> </a>
                            @endforeach

                        </div>
                    @endisset
                </div>

            </div>
        </div>
    </div>

@endsection
