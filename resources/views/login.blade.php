 @extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('login_post')}}" method="POST">
	<input type="text" id="login_name" name="login_name" placeholder="Your name" value="{{ old('login_name') }}">
	<input type="text" id="login_password" name="login_password" placeholder="Your password" value="{{ old('login_password') }}">
	<button type="submit" class="btn btn-default">Log In</button>
                  {{csrf_field()}}
</form></div>
    @endsection