<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
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
        $table->string('title',100);
        $table->string('url',100);
        $table->text('content');
        $table->text('author');
        $table->integer('likes')->default(0);       
        $table->boolean('is_delete')->default(false);
        $table->integer('user_id')->unsigned();
        $table->timestamps();
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
