<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 100; $i++)
        {
            $faker = Faker\Factory::create();

            DB::table('articles')->insert([
                'title' => 'mon article '.$i,
                'slug' => 'mon-article-'.$i,
                'img' => $faker->imageUrl($width = 320, $height = 240),
                'content' => str_random(244),
                'exerpt' => str_random(100),
                'category_id' => rand(1,2),
                'user_id' => rand(1,2),
                'created_at' => \Illuminate\Support\Carbon::now(),
                'updated_at' => \Illuminate\Support\Carbon::now(),
            ]);
        }
    }
}
