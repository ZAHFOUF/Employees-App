<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create(  [
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create( [
            'name' => 'Michael Johnson',
            'email' => 'michael.johnson@example.com',
            'password' => Hash::make('password'),
        ] );

        User::create(  [
            'name' => 'Sarah Williams',
            'email' => 'sarah.williams@example.com',
            'password' => Hash::make('password'),
        ] );


    }
}
