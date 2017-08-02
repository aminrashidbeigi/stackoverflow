@if(Session::has('success'))
    <div class="alert alert-success" role="alret">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alret">
        <strong>Error:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif