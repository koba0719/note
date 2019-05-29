<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '投稿テストタイトル',
            'content' => '投稿テスト',
            'likes_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Golangの環境構築',
            'content' => 'Golangの環境構築をします\nさぁ初めましょう',
            'likes_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Sliceとは',
            'content' => 'Sliceとはこんなもんです',
            'likes_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => '文字列連結の落とし穴',
            'content' => '投稿テスト',
            'likes_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 3,
            'title' => '文字列連結の落とし穴',
            'content' => '投稿テスト',
            'likes_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => '文字列連結の落とし穴',
            'content' => '投稿テスト',
            'likes_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
