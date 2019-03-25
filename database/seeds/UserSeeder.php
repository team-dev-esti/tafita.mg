<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        DB::table('users')->insert([
            'name' => 'Toavina',
            'lastname' => 'Andria',
            'email' => 'toavina@mail.com',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => Hash::make('000000'),
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Univ1',
            'lastname' => '',
            'email' => 'univ1@mail.com',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => Hash::make('000000'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Amdin',
            'lastname' => 'Root',
            'email' => 'admin@mail.com',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => Hash::make('000000'),
            'role_id' => 3
        ]);
    }
}
