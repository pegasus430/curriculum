<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'そうしのまくら',
            'email' => 'admin1@test.com',
            'password' => Hash::make('root'),
        ]);

        DB::table('users')->insert([
            'name' => 'やまだ',
            'email' => 'admin2@test.com',
            'password' => Hash::make('root'),
        ]);

        DB::table('users')->insert([
            'name' => 'たかはし',
            'email' => 'admin3@test.com',
            'password' => Hash::make('root'),
        ]);
    }
}
