@extends('layouts.main')

@section('content')

	<div id="wrapper">
		<div class="col">
			<div class="head">
				Welcome {{ucfirst(Auth::user()->username)}}
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

			<div data-section="settings">
				<h2>
					Settings
					<span class="commands">
						<span data-icon="&#xe01c;"></span>
					</span>
				</h2>
				<div class="panel">
					{{Form::open(array('action' => 'SettingController@postAddBackground', 'files' => true))}}
						{{Form::file('background')}}

						<button type="submit">Add this background</button>
						<button type="button" data-section-toggle="settings">Close</button>
					{{Form::close()}}

				</div>
			</div>

			<div data-section="help">
				<h2>
					Help
					<span class="commands">
						<span data-icon="&#xe007;"></span>
					</span>
				</h2>
				<div class="panel">
					[enter] for save <br>
					[shift] + [enter] for a new line
				</div>
			</div>

			<div data-section="todo">
				<h2>
					To-do
					<span class="commands">
						<a href="#" data-delete-show><span data-icon="&#xe021;"></span></a>
						<a href="#" onclick="createTodo()"><span data-icon="&#xe041;"></span></a>
					</span>
				</h2>

				<ul id="todo-list">

					<li data-todo-id="1">
						<a href="#" class="delete"></a>
						<span class="checkbox"></span>
						<div contenteditable="true">Put the trash out</div>
					</li>

				</ul>
			</div>

			<p style="text-align:center">
				Exec time : {{round( (microtime(true) - LARAVEL_START) * 1000, 2)}}ms |
				Memory use : {{round(memory_get_usage() / 1024 / 1024 ,2)}} [{{round(memory_get_peak_usage() / 1024 / 1024 ,2)}}]
			</p>
		</div>
	</div>

@stop