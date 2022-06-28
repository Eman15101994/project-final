
@extends('layouts.app')
<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@section('mycontent')
    <div class="row">
    <div class="pull-center">
    <a class="btn btn-success"  onclick="$('#form').toggle('slow')" > Create New Product</a>
        </div>
      
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }} " id="form" style="display: none"
          method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong >Product:</strong>
                    <input type="text" name="name" class="ss" placeholder="product" value="{{ old('product') }}">
                </div>
            </div>&nbsp&nbsp&nbsp&nbsp
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number"  name="price" class="ss" id="amountInput">
            </div>&nbsp&nbsp&nbsp&nbsp 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select  name="category">
                        
                          <option disabled selected>-- Category --</option>
                                 <option value="hot drink">hot drink</option>
                                 <option value="fresh drink"> dessert</option>
                                 <option value="cold drink">cold drink</option>
                                    <option value="food">food</option>
                               
                                </select>&nbsp&nbsp&nbsp&nbsp
                                <a href="{{ route('category') }}">Add Category</a>
            </div>
            &nbsp&nbsp&nbsp&nbsp
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="ss" placeholder="Article Image">
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>


    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @endsection
    @section('mycontent2')
    <div class="col-lg-12 margin-tb">
    <table class="table">
            <thead class=" table-warning ">
                <tr>
                    <th scope="col ">Product</th>
                    <th scope="col ">Price</th>
                    <th scope="col ">photo</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($products as $product)
  
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="/uploads/images/{{$product->image }}" width="65px" height="65px"></td>
                <td>
                    <a class="btn btn-sm btn-info" href="#">Available</a>
                    
                    <a class="btn btn-sm btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                  
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script>$(document).ready(function(){
 
  })


</script>
@endsection