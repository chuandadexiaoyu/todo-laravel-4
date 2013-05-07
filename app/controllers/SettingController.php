<?php

class SettingController extends BaseController {

	/**
	 * A method without post|get prefix will not be referenced by Route::controller()
	 * You must declare it manually
	 * @return string Return html of views/pages/partials/settings.blade.php
	 */
	public function index()
	{
		$wallpapers = [];
		foreach (glob(public_path().'/img/'.Auth::user()->id.'/background/*') as $filename) {
		    $wallpapers[] =  basename($filename);
		}
		return View::make('pages.partials.settings', compact('wallpapers'));
		return Response::json($files);
	}

	/**
	 * Change the wallpaper for the current user
	 * Can only be called via ajax (cf filter) so response will be json
	 */
	public function setBackground()
	{
		$user = User::find(Auth::user()->id);
		$user->wallpaper = e(Input::get('filename'));
		$user->save();

		return Response::json(['success' => 'wallpaper set']);
	}

	/**
	 * Background uploader
	 * Valid if the uploaded file is an image
	 * Check if the filename is already used
	 * Save the file in public/img/background/
	 */
	public function postAddBackground()
	{
		$validator = Validator::make(Input::file(), ['background' => 'required|image']);
		if ($validator->fails())
		{
			Session::flash('error','The background should be an image.');
			return Redirect::back();
		}

		$path = public_path().'/img/'.Auth::user()->id.'/background/';
		$filename = uniqid();
		$extension = Input::file('background')->getClientOriginalExtension();

		Input::file('background')->move($path, $filename.'.'.$extension);
		Session::flash('success','Background added.');
		return Redirect::back();
	}

}