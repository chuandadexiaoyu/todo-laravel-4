<?php

class SettingController extends BaseController {

	/**
	 * backgroundList
	 * A method without post|get prefix will not be referenced by Route::controller()
	 * You must declare it manually
	 * @return json returns a json with all background filename
	 */
	public function backgroundList()
	{
		$files = [];
		foreach (glob(public_path().'/img/background/*') as $filename) {
		    $files[] =  basename($filename);
		}
		return Response::json($files);
	}

	/**
	 * Change the background image
	 */
	public function setBackground()
	{
		// TODO
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

		$path = public_path().'/img/background/';
		$filename = Str::slug(basename(Input::file('background')->getClientOriginalName(), Input::file('background')->getClientOriginalExtension()));
		$extension = Input::file('background')->getClientOriginalExtension();

		// If file already exist append an uniq id after the filename
		if (File::isFile( $path.$filename.$extension) ) $filename = $filename.'-'.uniqid();

		Input::file('background')->move($path, $filename.$extension);
		Session::flash('success','Background added.');
		return Redirect::back();
	}

}