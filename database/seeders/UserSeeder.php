<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role'=>'admin',
            'status'=>'active',
            ],
            [
                'name' => 'teacher',
                'email' => 'teacher@gmail.com',
                'password' => Hash::make('12345678'),
                'role'=>'teacher',
                'status'=>'active',
                ],

            [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'role'=>'user',
            'status'=>'active',

            ]
          
        ]);
    }
}
