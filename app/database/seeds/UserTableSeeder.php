<?php
class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'email' => 'foo@example.com',
			'username' => 'laravel',
			'password' => Hash::make('test'),
		]);
	}

}
