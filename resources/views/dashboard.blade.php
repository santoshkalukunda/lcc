
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
<html lang="en">
    <head>
        <title>Nepali Datepicker v3.2</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />
        <!-- Nepali Datepicker -->
        <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v3.2.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <p>
            <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date"/>
        </p>
 
        <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.2.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            window.onload = function() {
                var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker();
            };
        </script>
    </body>
</html>