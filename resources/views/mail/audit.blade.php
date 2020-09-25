@component('mail::message')
    # Dear {{ $shareholderName }},
 
    This is to notify that you have to submit the annual audit report to Company Registrar Office in time. 

    Thank You,
    {!!$profile->name!!}
    Thekendra Raj Joshi
    {!!$profile->contact!!}
    {!!$profile->address!!}
    {!!$profile->email!!}


@endcomponent
