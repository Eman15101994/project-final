<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@extends('layouts.app')
@section('mycontent')
<form action="{{route('ordermenu.myorders')}}" method="get">
      <input type="date" name="date" class="form-control">
      <button type="submit" class="btn btn-primary">search</button>
</form>
    
<table class="table">
<tbody>
          <tr>
            <th>Order date</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
           </tr>
           @foreach($data_user as $orde)
           <tr>
            <td>
                {{$orde->created_at}}

            </td>
            <td>{{$orde->total_price}}</td>
            <td></td>
            <td></td>
<tr>
@endforeach
  <tbody>
</table>
@endsection
@section('script')
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script>$(document).ready(function(){
        
 
  })

</script>
@endsection