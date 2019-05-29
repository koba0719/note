<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => 1,
            'comment' => '<p>Comment1</p><ul><li>foo</li></ul>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 1,
            'comment' => '<p>Comment2</p><ul><li>bar</li></ul>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
