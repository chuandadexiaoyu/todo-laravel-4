<h2>
	Settings
	<span class="commands">
		<span data-icon="&#xe01c;"></span>
	</span>
</h2>
<div class="panel">
	{{Form::open(array('action' => 'SettingController@postAddBackground', 'files' => true))}}
		{{Form::file('background')}}

		<button type="submit">Upload background</button>
	{{Form::close()}}

	<div id="background-gallery">
		@foreach ($wallpapers as $wallpaper)
			<a href="#" data-filename="{{$wallpaper}}"><img src="/img/{{Auth::user()->id}}/background/{{$wallpaper}}"></a>
		@endforeach
	</div>
</div>