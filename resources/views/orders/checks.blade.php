@extends('layouts.app')
<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@section('mycontent')
        
<form action="{{route('ordermenu.index')}}" method="get">
      <input type="date" name="date" class="form-control">
      <select  class="form-select" name="user_select"  id="select" aria-label="Default select example">
  <option selected disabled>My User</option>
  @foreach($allusers as $user)
  <option  value="{{$user->id}}">{{$user->name}}</option>
  @endforeach
</select>
<button type="submit" class="btn btn-primary">search</button>
</form>
      


        <table class="table">
        <tr> 
            <th>Name</th>
            <th>Amount</th>
        
        </tr>
       
        @foreach($or as $order)
        <tr>
        <td>
      <button type="submit" class="btn btn-danger" onclick="$('#d-{{$order->id}}').toggle('slow')">+</button>
          {{$order->user_name}}</td>
           <td>{{$order->amount}}</td>
</tr>
           <tbody id="d-{{$order->id}}" style="display:none">
          <tr>
            <th>Order date</th>
            <th>Price</th>
           </tr>
           @foreach($order->order as $orde)
           <tr>
            <td>
              <form method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="$('#card-{{$order->id}}').toggle('slow')">+</button>
                {{$orde->created_at}}
</form>
</td>
<td>{{$orde->price}}</td>
<tr>
@endforeach
</tbody>

    @endforeach
       

</table>
    
@endsection
@section('script')
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script>$(document).ready(function(){
        
 
  })

</script>
@endsection