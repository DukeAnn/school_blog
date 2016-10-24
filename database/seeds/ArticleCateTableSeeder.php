<?php

use Illuminate\Database\Seeder;

class ArticleCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article_cates')->insert([
            'id' => 1,
            'cate_name' => '默认分类',
            'describe' => '默认分类',
            'alias' => 'default',
        ]);
    }
}
