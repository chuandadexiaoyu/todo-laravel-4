<?php
class TodoTableSeeder extends Seeder {

	public function run()
	{
		DB::table('todos')->delete();
		$user = User::first();
		Todo::create([ 'title' => 'Put the trash out', 'checked' => 0, 'user_id' => $user->id ]);
		Todo::create([ 'title' => 'Go out and buy pizza & beer', 'checked' => 0, 'user_id' => $user->id ]);
		Todo::create([ 'title' => 'Take coffee', 'checked' => 1, 'user_id' => $user->id ]);
		Todo::create([ 'title' => 'Do a barel roll', 'checked' => 0, 'user_id' => $user->id ]);
	}
}
