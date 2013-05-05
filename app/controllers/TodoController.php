<?php

class TodoController extends BaseController {

	public function __construct()
	{
		// Restrict all methods to ajax request only
		$this->beforeFilter('ajax');
	}

	/**
	 * Returns a file that contains all todos for the current user
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
	 * @return Response JSON
	 */
	public function create()
	{
		$todo = new Todo;
		$todo->user_id = Auth::user()->id;
		$todo->save();
		return Response::json(['success' => 'create', 'id' => $todo->id]);
	}

	/**
	 * Update the specified todo.
	 *
	 * @param  int  $id
	 * @return Response JSON
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
	 * Remove the specified todo from the database.
	 *
	 * @param  int  $id
	 * @return Response JSON
	 */
	public function destroy($id)
	{
		Todo::destroy($id);
		return Response::json(['success' => 'delete', 'id' => $id]);
	}

}