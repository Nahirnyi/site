 @extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('register_post')}}" method="POST">
	<input type="text" id="name" name="name" placeholder="Your name" value="{{ old('name') }}">
	<input type="text" id="password" name="password" placeholder="Your password" value="{{ old('password') }}">
	<button type="submit" class="btn btn-default">Register</button>
                  {{csrf_field()}}
</form></div>
    @endsection