<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            //$table->unsignedBigInteger('author'); // Foreign key referencing 'id' in 'users' table
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post');   // Foreign key referencing 'id' in 'blog_posts' table
            $table->date('datePosted');
            $table->integer('likes');
            $table->timestamps();

             // Define foreign key constraints
            // $table->foreign('author')->references('id')->on('users');
             $table->foreign('post')->references('id')->on('posts');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
