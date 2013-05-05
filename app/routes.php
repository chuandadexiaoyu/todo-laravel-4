<?php

/**
 * Homepage, contain all our todo interface, require to be logged for access
 */
Route::get('/', ['before' => 'auth', function()
{
	return View::make('pages.homepage');
}]);

/**
 * Resource controller, will handle all change to our todo-list via ajax
 * this controller only accept AJAX request cf: $this->beforeFilter('ajax'); in __construct
 */
Route::resource('todo', 'TodoController', ['except' => ['show', 'store', 'edit']]);


// Login form
Route::get('login', ['as' => 'login', function(){
	return View::make('pages.login');
}]);

// Login attempt
Route::post('login', ['as' => 'login.attempt', 'before' => 'csrf', function() {
	if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
	{
		// redirect to the intended url before getting cough by the auth filter
		return Redirect::intended('/');
	}
	Session::flash('error','Wasnt it.');
	return Redirect::route('login')->withInput(['except' => 'password']);
}]);

// Logout
Route::get('logout', ['as' => 'logout', function(){
	Auth::logout();
	return Redirect::route('login');
}]);
