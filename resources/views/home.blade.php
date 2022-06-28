<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@extends('layouts.app')
@if(Auth::user()->id == "1")
@section('mycontent') 
<select id="myusers1" class="form-select" aria-label="Default select example">
  <option selected disabled>My User</option>
  @foreach($allusers as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>
  @endforeach
</select>
   @endsection
 @endif
@section('mycontent2')

<div class="row">
<!--start left column-->
  <div class="col-4" style="border:1px solid;  border-top-right-radius:5em; border-bottom-right-radius:5em; border-top-left-radius:5em;
  padding-left:25px;height: 600px;position: fixed;left: 2%;width: 30%;top: 25%;">
  <table class="table" style="border:2px ; text-align:center;">
  @include('layouts.Session')
        <h1 style="font-size:50px;color:red; text-align:center;">Your order</h1>
            <tbody>
              @foreach($allcarts as $cart)
              <tr>
              <td>{{$cart->product_name}}</td>
              <td>{{$cart->quantity}}</td>
            <td>  <form  method="POST">
                        @csrf
                        <button type="submit" formaction="{{ route('increment',$cart->id)}}" class="btn btn-sm btn-dark">+</button>
                        <button type="submit" formaction="{{ route('decrement',$cart->id)}}" class="btn btn-sm btn-dark">-</button>
                       
                    </form>
                 

              </td>
              <td>{{$cart->price}}</td>
          
              <td>
              <form action="{{ route('carts.destroy',$cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                    </form>

              </td>
          </tr>
              @endforeach 
            </tbody>     
</table>

<br>
    <strong>Totel:</strong>
        <input type="text" value={{$money}}><br><br>
        
&nbsp
        <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
        @foreach($allcarts as $cart)
        <input type="text" name="product_name[]" value="{{$cart->product_name}}" hidden>
        <input type="text" name="quantity[]" value="{{$cart->quantity}}" hidden>
        <input type="text" name="price[]" value="{{$cart->price}}" hidden>
         <input type="text" name="image[]" value="{{$cart->image}}" hidden>
        
                  @endforeach 
                  <input type="text" id="myuser" name="user_id" hidden><br>
                  <input type="text"  name="total_price" value={{$money}} hidden>
                  <input type="text"  name="amount" value={{$amount}} hidden>
                  <strong>Note:</strong>
                  <textarea class="form-control" name="notes" >Note</textarea>  
                  <input type="submit" class="btn btn-primary" value="confirm"> 
                    </form>
        
</div>
<!--end left column-->
<!--start right column-->
<div class="col-8">

<div class="row">
@foreach($allproducts as $product)

  <div class="col-4">
        
<div class="card">
  <img src="uploads/images/{{$product->image}}" class="card-img-top">
  <div class="back" style="position:absolute; height:100%; background-color:#00000040; opacity:0;z-index: 3;
    top: 0;
    left: 0;
    width: 100%;
    border-radius: 3rem;"></div>

  <div class="card-body">
    <h5 class="card-title" style="color:#000000;font-size:X-large;">{{$product->name}}</h5>
    <h5 class="card-title" style="color:#000000;font-size:X-large;">{{$product->price}}</h5>
    <form action="{{route('addcart',$product->id)}}" method="POST">
    @csrf
    <input type="number" value="1" min="1" class="form-control-q" name="quantity">
    <br>
    <input class="btn btn-primary" value="Add" type="submit">
</form>
 </div>
</div>

</div>
@endforeach
</div>

</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script>$(document).ready(function(){
  $("#myusers1").change(function(){
    $("#myuser").val($("#myusers1").val())
  })

})
</script>
@endsection
