@extends('layouts.main')

@section('content')

	<div id="wrapper">
		<div class="col">
			<div class="head">
				Welcome {{ucfirst(Auth::user()->username)}}
				<span class="commands">
					<a data-section-toggle="help" href="#"><span data-icon="&#xe007;"></span></a>
					<a data-section-toggle="settings" href="#"><span data-icon="&#xe01c;"></span></a>
					<a href="{{URL::route('logout')}}" class="logout"><span data-icon="&#xe01e;"></span></a>
				</span>
			</div>

			<div data-section="settings">
				<h2>
					Settings
					<span class="commands">
						<span data-icon="&#xe01c;"></span>
					</span>
				</h2>
				<div class="panel">
					<p>Wallpaper demo file upload</p>
					<button type="button" data-section-toggle="settings">Close</button>
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
						<a href="#"><span data-icon="&#xe041;"></span></a>
					</span>
				</h2>
				<ul id="todo-list">
					<li data-todo-id="1">
						<a href="#" class="delete"></a>
						<span class="checkbox"></span>
						<div contenteditable="true">Put the trash out</div>
					</li>
					<li data-todo-id="2">
						<a href="#" class="delete"></a>
						<span class="checkbox"></span>
						<div contenteditable="true">Go out and buy pizza & beer</div>
					</li>
					<li data-todo-id="3">
						<a href="#" class="delete"></a>
						<span class="checkbox checked"></span>
						<div contenteditable="true">Take coffee</div>
					</li>
					<li data-todo-id="4">
						<a href="#" class="delete"></a>
						<span class="checkbox"></span>
						<div contenteditable="true">Do a barel roll</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

@stop