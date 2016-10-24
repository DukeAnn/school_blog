<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('cate_id');
            $table->string('cate');
            $table->string('tags')->nullable();//允许为空
            $table->integer('pv')->nullable();
            $table->string('pic')->nullable();
            $table->text('content');
            $table->string('ico');
            $table->timestamps();
            $table->timestamp('published_at')->index();//正式发布时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
