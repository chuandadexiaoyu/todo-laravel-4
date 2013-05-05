@extends('layouts.main')

@section('content')

	<div id="wrapper">
		<div class="col">
			<div class="head">
				{{ucfirst(Auth::user()->username)}}
				<span class="commands">
					<a data-section-toggle="todo" href="#" class="current"><span data-icon="&#xe039;"></span></a>
					<a data-section-toggle="help" href="#"><span data-icon="&#xe007;"></span></a>
					<a data-section-toggle="settings" href="#"><span data-icon="&#xe01c;"></span></a>
					<a href="{{URL::route('logout')}}" class="logout"><span data-icon="&#xe01e;"></span></a>
				</span>
			</div>

			@if(Session::has('error'))
				<div class="alert error">{{Session::get('error')}} <a href="#" class="close">x</a></div>
			@elseif(Session::has('success'))
				<div class="alert success">{{Session::get('success')}} <a href="#" class="close">x</a></div>
			@endif

			{{-- This is blade's one line comment, its like <?php // foo ?> and wont appear in html. Dont forget to close it ! --}}
			{{-- Load settings section in views/pages/partials/ --}}
			@include('pages.partials.settings')

			@include('pages.partials.help')

			@include('pages.partials.todo')

			<p style="text-align:center">
				Exec time : {{round( (microtime(true) - LARAVEL_START) * 1000, 2)}}ms |
				Memory use : {{round(memory_get_usage() / 1024 / 1024 ,2)}} [{{round(memory_get_peak_usage() / 1024 / 1024 ,2)}}]
			</p>
		</div>
	</div>

@stop