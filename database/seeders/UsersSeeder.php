<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
         $data = [
            [
                'name' => 'Tawan',
                'email' => 'tawan@gmail.com',
                'password' => Hash::make('1234'),
                'role' =>1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Twan',
                'email' => 'twan1@gmail.com',
                'password' => Hash::make('123456'),
                'role' =>2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
