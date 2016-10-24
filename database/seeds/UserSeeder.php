<?php

use Illuminate\Database\Seeder;
class UserSeeder extends Seeder{
    public function run(){
        DB::table('users')->insert([
            'name' => '安达开',
            'email' => 'adk@adki.me',
            'password' => bcrypt('111111'),
            'auth'=> 5,
        ]);
    }
}