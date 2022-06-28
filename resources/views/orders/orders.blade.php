@extends('layouts.app')
<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@section('mycontent')
<table class="table">
      <thead>
        
        <th>Order data</th>
        <th>Name</th>
        <th>Room No</th>
        <th>Ext</th>
        <th>Action</th>
       
</thead>
<tbody>
      @foreach($or as $item)
      <tr>
      <td>
      <button type="submit" class="btn btn-danger" onclick="$('#d-{{$item->id}}').toggle('slow')">{{$item->created_at}}</button>
            </td>
        <td>{{$item->user_name}}</td>
        <td>{{$item->Room_No}}</td>
        <td>{{$item->Ext}}</td>
        <td>deliver</td>
      
      </tr>
<tbody id="d-{{$item->id}}" style="display:none">
      <tr>
            <th>Image</th>
            <th>quantity</th>
            <th>Price</th>
       </tr>
@foreach($item->order as $items) 
       <tr>
            <td><img src="uploads/images/{{$items->image}}" style="height:50px; width:50px;"></td>
            <td>{{$items->quantity}}</td>
            <td>{{$items->price}}</td>
       </tr>

      @endforeach
      </tbody>

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