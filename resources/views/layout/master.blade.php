
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dompixel Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
  <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
</head>
<body> 
    
  <div class="container">
      @yield('content')
   </div>  
   <footer>
      <script>
        function dlt($id){
            if (window.confirm('Want To Delete this Address?')) {
                location.href = 'http://localhost/lodur/AddressController/deleteAddress/id/'+$id;
            } 
        }

        $(document).ready(function() {
            $('#address_form').validate({
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    first_name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    street: {
                        minlength: 2,
                        required: true
                    },
                    zipcode: {
                        minlength: 2,
                        required: true
                    },
                    city_id: {
                        required: true
                    },
                },
                messages: {
                  name: "Please enter Name",
                  first_name: "Please enter firstname",
                  email: "Please enter a valid email address",
                  street: "Please enter street",
                  zipcode: "Please enter zipcode",
                  city_id: "Please Select City"
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                  // Add the `help-block` class to the error element
                  error.addClass( "help-block" );

                  if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                  } else {
                    error.insertAfter( element );
                  }
                },
                highlight: function ( element, errorClass, validClass ) {
                  $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                  $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            }); 
        });
      </script>
  </footer>
</body>
</html>