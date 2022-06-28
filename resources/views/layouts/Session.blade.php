@if(Session::has('delete'))
<p class="alert alert-danger">{{ Session::get('delete') }}</p>
@endif

@if(Session::has('add'))
<p class="alert alert-success">{{ Session::get('add') }}</p>
@endif

@if(Session::has('category'))
<p class="alert alert-success">{{ Session::get('category') }}</p>
@endif