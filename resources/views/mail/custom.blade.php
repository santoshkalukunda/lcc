<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LCC Mail</title>
</head>
<body>
    Dear {{ $shareholderName }},
    
    <p>{!! $mail!!}</p>
    Thank You,<br>
    {!!$profile->name!!} <br>
    Thekendra Raj Joshi <br>
    {!!$profile->contact!!} <br>
    {!!$profile->address!!} <br>
    {!!$profile->email!!} <br>
</body>
</html>
