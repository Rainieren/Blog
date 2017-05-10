<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('posts')->insert([
            'title' => 'First post',
            'slug' => 'first_post',
            'user_id' => 1,
            'text' => $faker->text
        ]);

        DB::table('posts')->insert([
            'title' => 'Second post',
            'slug' => 'second_post',
            'user_id' => 1,
            'text' => $faker->text
        ]);

        DB::table('posts')->insert([
            'title' => 'Third post',
            'slug' => 'third_post',
            'user_id' => 1,
            'text' => $faker->text
        ]);
    }
}
