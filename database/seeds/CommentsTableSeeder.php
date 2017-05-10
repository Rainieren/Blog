<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 1,
            'comment' => $faker->paragraph()
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'comment' => $faker->paragraph()
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 2,
            'comment' => $faker->paragraph()
        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => 2,
            'comment' => $faker->paragraph()
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 2,
            'comment' => $faker->paragraph()
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 3,
            'comment' => $faker->paragraph()
        ]);
    }
}
