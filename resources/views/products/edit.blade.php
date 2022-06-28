@extends('layouts.app')
<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@section('mycontent')

   
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
        </div>
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
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product:</strong>
                    <input type="text" name="name" class="form-control" placeholder="product" value="{{ $product->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number"  name="price"  value="{{$product->price}}"class="form-control" id="amountInput">
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong >Category:</strong>
                    <select  name="category" >
                        
                          <option disabled selected >-- Category --</option>
                                 <option value="hot drink">hot drink</option>
                                 <option value="fresh drink"> fresh drink</option>
                                 <option value="cold drink">cold drink</option>
                                <option value="ice cream">ice cream</option>
                               
                                </select>
                    &nbsp&nbsp&nbsp<a href="#">Add Category</a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Product Image">
                    <img src="/uploads/images/{{ $product->image }}" width="200px">
                </div>
            </div><br><br> 
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </form>
@endsection