


<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="lib/style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link
      href="{{asset('date/nepali.datepicker.v3.2.min.css')}}"
      rel="stylesheet"
      type="text/css"
    />
  </head>

  <body>
    <h1>Nepali Datepicker v3 with Bootstrap Modal</h1>

    <p>
      <input
        type="text"
        id="nepali-datepicker"
        class="nepali-datepicker"
        placeholder="Select Nepali Date"
      />
      <input
        type="text"
        id="nepali-datepicker-1"
        class="nepali-datepicker"
        placeholder="Select Nepali Date"
      />
    </p>


    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
    >
      Launch demo modal
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              <input
                type="text"
                id="modal-nepali-datepicker"
                placeholder="Select Nepali Date"
              />
            </p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </body>
<script src="{{asset('date/nepali.datepicker.v3.2.min.js')}}" type="text/javascript"></script>
  <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"
  ></script>
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
