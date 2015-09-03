<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create(['username' => 'duterte','password' => Hash::make($data['forpresident'])]);
    }
}
