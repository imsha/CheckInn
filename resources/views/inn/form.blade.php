<form action="/inn" method="post">
    <input type="text" name="inn"/>

    <input type="submit"/>
</form>

@if (isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::has('success'))
    <div class="alert alert-success">
        {{\Session::get('message')}}
    </div>
@endif
