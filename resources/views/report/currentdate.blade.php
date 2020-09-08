<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
  <link rel="stylesheet" href="{{asset('app.css')}}">
  </head>
  <body>
    <input name="current_date" type="text" id="nepali-datepicker-1" 
    placeholder="Select Nepali Date" />
  </body>
<script src="{{asset('date/nepali.datepicker.v3.2.min.js')}}" type="text/javascript"></script>
  <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  >
</script>
 

  <script>
      // Add your code here
window.onload = function() {
    var modalInput = document.getElementById("modal-nepali-datepicker");
    modalInput.nepaliDatePicker();
};

$(document).ready(function(){
    var currentDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate());

    $('#nepali-datepicker-1').val(currentDate);

    $('.nepali-datepicker').nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
    });
});
  </script>
</html>
