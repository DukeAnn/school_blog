<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('GalleryCateTableSeeder');
        $this->call('ArticleCateTableSeeder');
        $this->call('UserSeeder');
        $this->call('SeoTableSeeder');
    }
}
