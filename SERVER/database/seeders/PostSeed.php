<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create( [
            'title' => 'Lorem Ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'user' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Post::create( [
            'title' => 'Vestibulum Ante',
            'content' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            'user' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        Post::create(  [
            'title' => 'Duis Porta',
            'content' => 'Duis porta, eros sed congue finibus, massa augue pretium tellus, sit amet varius est ligula ut tortor.',
            'user' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        Post::create(  [
            'title' => 'Pellentesque Habitant',
            'content' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'user' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        Post::create(  [
            'title' => 'Aliquam Tincidunt',
            'content' => 'Aliquam tincidunt diam mauris, ut dictum neque tincidunt at.',
            'user' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);



    }
}
