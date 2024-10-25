<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('participant_categories', function (blueprint $table){
            $table->id();
            $table->unsignedBigInteger('events_id')->index();
            $table->string('participant_name',500);

            $table->timestamps();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_categories');
    }
};
