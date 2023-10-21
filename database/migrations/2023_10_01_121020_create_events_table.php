<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['Webinar', 'Workshop', 'Fair','Competition', 'Seminar', 'Program','Virtual chat']); // enum type test
            $table->unsignedBigInteger('user_id'); // Add user_id for the publisher
            $table->text('description', 255); // Added a maximum length of 255 characters
            $table->dateTime('eventDateTime'); // Includes date and time
            $table->date('reservationDeadline');
            $table->boolean('isClosed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
