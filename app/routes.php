<?php


Route::get('/', ['before' => 'auth', function()
{
	return View::make('pages.homepage');
}]);


Route::resource('todo', 'TodoController');

/* Login/logout Stuff */
Route::get('login', ['as' => 'login', function(){
	return View::make('pages.login');
}]);

Route::post('login', ['as' => 'login.attempt', 'before' => 'csrf', function() {
	if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
	{
		return Redirect::intended('/');
	}
	Session::flash('error','Wasnt it.');
	return Redirect::route('login')->withInput(['except' => 'password']);
}]);

Route::get('logout', ['as' => 'logout', function(){
	Auth::logout();
	return Redirect::route('login');
}]);
