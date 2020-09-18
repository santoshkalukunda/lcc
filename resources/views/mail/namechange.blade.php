@component('mail::message')
    # Dear {{ $shareholderName }},
 
    This is to notify that the name of your company have been changed from {{ $nameChange->old_name }}
    to {{ $nameChange->new_name }} Corporation you have to submit your company name change document 
    with in {{ $curentdate}} days

    Thanks,
    LCC 
    Dhangadhi, Kailali, Nepal


@endcomponent
