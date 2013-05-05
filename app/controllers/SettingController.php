<?php

class SettingController extends BaseController {

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