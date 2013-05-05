<?php

class TodoController extends BaseController {

	public function __construct()
	{
		// Restrict all methods to ajax request only
		$this->beforeFilter('ajax');
	}

	/**
	 * Return a JSON with all todos for the current user
	 *
	 * @return Response JSON
	 */
	public function index()
	{
		return Todo::whereUserId(Auth::user()->id)->get()->toJson();
	}

	/**
	 * Create a new empty todo
	 *
	 * @return Response
	 */
	public function create()
	{
		$todo = new Todo;
		$todo->user_id = Auth::user()->id;
		$todo->save();
		return Response::json(['success' => 'create', 'id' => $todo->id]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$todo = Todo::whereUserId(Auth::user()->id)->whereId($id)->first();
		if (! $todo)
		{
			return Response::json(['error' => 'Todo Not Found']);
		}
		if (Input::has('title')) $todo->title = Input::get('title');
		if (Input::has('checked')) $todo->checked = Input::get('checked');
		$todo->save();

		return Response::json(['success' => 'update', 'id' => $todo->id, 'title' => $todo->title, 'checked' => $todo->checked]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Todo::destroy($id);
		return Response::json(['success' => 'delete', 'id' => $id]);
	}

}