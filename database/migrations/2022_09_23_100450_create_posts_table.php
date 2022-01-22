<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->mediumText('title');
            $table->string('country')->nullable();            
            $table->mediumText('slug')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('body');
            $table->string('image_path')->default('blogs/no-image.jpg');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('is_published')->default(true);

            // $table->integer('tag_id')->unsigned()->nullable();
            // $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
