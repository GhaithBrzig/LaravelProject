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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content'); 
            $table->enum('category', ['Career Advice', 'Success Stories', 'Entrepreneurship','Mentorship']);          
            $table->unsignedBigInteger('user_id');
            $table->integer('likes');
            $table->string('photo', 300);
            $table->timestamps();

             // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      
             
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
};
