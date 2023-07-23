@extends('layout.master')

@section('content')    
  <div class="container">
    <h2>Product Catalog</h2>
    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    <a  href="{{route('create')}}"; class="btn btn-default">Add Product</a>&nbsp;&nbsp;    
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        @if($products)
          @foreach($products as $product)
            <tr>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              <td><a  href="{{route('edit',$product->id)}}"; class="btn btn-default">Edit</a>&nbsp;
                    <form action="{{ route('delete', ['id' => $product->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>                
                </td>
            </tr>
          @endforeach
        @endif        
      </tbody>  
    </table>
   </div>  
  @endsection
