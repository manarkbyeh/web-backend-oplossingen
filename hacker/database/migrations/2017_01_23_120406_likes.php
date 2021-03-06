<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Likes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('likes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('up')->default(0);
            $table->integer('down')->default(0);
            $table->integer('post_id');
            $table->integer('user_id');
            $table->softDeletes();
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
        Schema::drop('likes');
    }
}
