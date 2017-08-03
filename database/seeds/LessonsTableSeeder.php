<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $lessons = factory(App\Lesson::class, 30)->create();
    }
}
