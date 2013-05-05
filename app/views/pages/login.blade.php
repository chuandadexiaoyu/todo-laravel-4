@extends('layouts.main')

@section('content')

	@if(Session::has('error'))
		<div data-alert class="alert-box alert">{{Session::get('error')}}<a href="#" class="close">&times;</a></div>
	@endif

	{{Form::open(['url' => URL::to('login'), 'id' => 'login', 'autocomplete' => 'off'])}}
		{{Form::token()}}
		<div class="title">Authentification</div>
		{{Form::text('username', Input::old('username'))}}
		{{Form::password('password')}}
		<button type="submit">Login</button>
	{{Form::close()}}

@stop