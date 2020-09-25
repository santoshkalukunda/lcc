@component('mail::message')
    # Dear {{ $shareholderName }},
 
    This is to notify that the name of your company have been changed from {!! $nameChange->old_name !!}
    to {!! $nameChange->new_name !!} Corporation you have to submit the notice of namechange published 
    in national daily newspaper 3 times within {{ $curentdate}} days.

    Thank You,
    {!!$profile->name!!}
    Thekendra Raj Joshi
    {!!$profile->contact!!}
    {!!$profile->address!!}
    {!!$profile->email!!}
    
@endcomponent
