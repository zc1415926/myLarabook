<?php

use Faker\Factory as Faker;
use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$userIds = User::lists('id');
		foreach(range(50, 200) as $index)
		{
			Status::create([
				'user_id' => $faker->randomElement($userIds),
				'body' => $faker->sentence()
			]);
		}
	}

}