<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::create([
            "comment" => "nice work !" ,
            "user" => 1,
            "post" => 1
       ]);

       Comments::create([
        "comment" => "That Very Nice" ,
        "user" => 2,
        "post" => 1
   ]);
    }
}
