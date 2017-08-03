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
    	$faker = Faker::create();
    	
	    DB::table('lesson')->insert([
	    	'title' => $faker->sentence(5),
		    'body'  => $faker->paragraph(4)
	    ]);
    }
}
