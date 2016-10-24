<?php

use Illuminate\Database\Seeder;

class GalleryCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery_cates')->insert([
            'id' => 1,
            'name' => '默认相册',
            'dir_path' => 'uploads/slide',
            'describe' => '文章图片',
            'alias' => 'deaf',
        ]);

    }
}
