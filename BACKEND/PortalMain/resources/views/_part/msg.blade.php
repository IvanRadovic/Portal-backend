@if(Session::has('message'))
   <p class="alert alert-info" style="color: yellow;">{{ Session::get('message') }}</p>
@endif

@if(Session::has('success'))
   <p class="alert alert-success" style="color: green;">{{ Session::get('success') }}</p>
@endif

@if(Session::has('danger'))
   <p class="alert alert-danger" style="color: red;">{{ Session::get('danger') }}</p>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
