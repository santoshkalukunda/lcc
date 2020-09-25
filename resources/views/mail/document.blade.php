@component('mail::message')
    # Dear {{$shareholderName}},
 
    This is to notify that you have to submit you have to submit the starting reports with
    bank statement and auditor letter to company registrar office with in  {{$days}} days.

    Thank You,
    {!!$profile->name!!}
    Thekendra Raj Joshi
    {!!$profile->contact!!}
    {!!$profile->address!!}
    {!!$profile->email!!}


@endcomponent
