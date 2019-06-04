<?php

use Illuminate\Database\Seeder;

class ArticlesTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 100; $i++){
            DB::table('article_tag')->insert([
                'article_id' => $i,
                'tag_id' => rand(1,2),
            ]);
        }
    }
}
