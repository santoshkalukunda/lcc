@extends('dashboard')
@section('title')
    Company Audit
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
                    <div class="card-header">Audit</div>
                    <div class="card-body">
                        @isset($audit)
                        @foreach ($audit as $item)
                        <div class="row">
                            <div class="col-md-12 font-bold text-center font-18 {{ $currentdate == $item->auditreport_fiscal ? '' : 'bg-danger'}} bg-info ">Status :  {{ $currentdate == $item->auditreport_fiscal ? '' : 'Not'}} Audited</div>
                        </div>
                        <div class="row mt-3 mb-3">
                            Comments
                            <div class="col-md-12">
                                <div class="pl-2"
                                    style="height:140px; border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
                                    {!! $item->auditreport_comments !!}
                                </div>
                            </div>
                        </div>
                      <hr>
                            <form action="{{route('audit.update',$item->id)}}" method="POST">
                                @method('put')
                                @csrf
                                <div class="row form-group">
                                    <div class="col-md-1">Status</div>
                                    <div class="col-md-3">
                                        <select name="auditreport_status" class="form-control" id="">
                                            <option value="notaudited">Not Audited</option>
                                            <option value="Audited">Audited</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <textarea name="audit_comments" class="form-control" rows="5" required>
                                  </textarea>
                                    </div>
                                </div>
                              <div class="row">
                                <input type="submit" class="btn btn-success mt-1" value="Comments">
                              </div>
                            </form>
                            
                        @endforeach
                            
                        @endisset
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection
