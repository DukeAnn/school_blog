<?php

use Illuminate\Database\Seeder;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('seos')->insert([
            'name' => '首页',
            'title' => '安达开的博客',
            'keyword' =>'安达开,adk',
            'describe'=> '安达开的毕业设计',
        ]);
        DB::table('seos')->insert([
            'name' => '摄影',
            'title' => '雨巷的午茶',
            'keyword' =>'安达开,adk',
            'describe'=> '安达开的毕业设计',
        ]);
        DB::table('seos')->insert([
            'name' => '博客',
            'title' => '安达开的博客',
            'keyword' =>'安达开,adk',
            'describe'=> '安达开的毕业设计',
        ]);
    }
}
