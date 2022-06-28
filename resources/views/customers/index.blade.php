
@extends('layouts.app')
<style>
    body{
    
      background-image:  linear-gradient(57deg,rgb(242, 222, 192) 0%,rgb(244, 245, 245) 46.63%,rgb(202, 159, 135) 100%)
}
</style>
@section('mycontent')
@include('layouts.Session')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-center">
                <a class="btn btn-success" href="{{ route('customers.create') }}">New User </a>
        </div>
        
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table">
        <tr> 
            <th>Name</th>
            <th>Room No</th>
            <th>Iamge</th>
            <th>Ext</th>
            <th>Action</th>
            
        </tr>
        @foreach ($users as $user)
  
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->Room_No }}</td>
                <td><img src="/uploads/images/{{$user->Profile_Picture }}" style="height:200px; width:200px;"></td>
                <td>{{ $user->Ext}}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('customers.edit',$user->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
{{--    {!! $records->links() !!}--}}
@endsection