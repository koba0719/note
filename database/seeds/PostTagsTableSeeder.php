<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tags')->insert([
            'post_id' => 1,
            'tag_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('post_tags')->insert([
            'post_id' => 1,
            'tag_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
