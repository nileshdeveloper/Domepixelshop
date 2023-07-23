@extends('layout.master')

@section('content')    
  <div class="container">
    <h2>Edit Product</h2>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('update', ['id' => $product->id]) }}" name="product" id="product" method="post" novalidate="novalidate">
      @csrf

      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
      </div>
      <div class="form-group">
        <label for="name">Description:</label>
        <textarea class="form-control" name="description" id="description" >{{$product->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="name">Price:</label>
        <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
      </div>
      <div class="form-group">
        <label for="name">Quantity:</label>
        <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}">
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
      <a href="{{ route('index') }}" class="btn btn-default">Cancel</a>

    </form>
   </div>  
    <footer>
      <script>

       jQuery(document).ready(function() {
           jQuery('#product').validate({
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    price: {
                        required: true,
                    },
                    quantity: {
                        minlength: 1,
                        required: true
                    }
                },
                messages: {
                  name: "Please enter Product Name",
                  price: "Please enter price",
                  quantity: "Please Select quantity"
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
  @endsection 
