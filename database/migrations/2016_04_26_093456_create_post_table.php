<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->string('image');
            $table->integer('user_id');
            $table->boolean('publish');
            $table->timestamps();
        });

        Schema::table('posts',function(Blueprint $table){         
           /*Line 14*/
            $table->integer('viewCount')->default(0)->after('content');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('posts');
    }

}
