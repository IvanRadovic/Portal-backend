@if(Session::has('message'))
   <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

@if(Session::has('success'))
   <p class="alert alert-success">{{ Session::get('message') }}</p>
@endif

@if(Session::has('danger'))
   <p class="alert alert-danger">{{ Session::get('message') }}</p>
@endif
