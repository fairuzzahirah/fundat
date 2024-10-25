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
        schema::create('events', function (blueprint $table){
            $table->id();
            $table->unsignedBigInteger('organizers_id')->index();
            $table->string('title',100);
            $table->string('type_event',200);
            $table->string('status_event',200);
            $table->integer('target_participant');
            $table->text('description');

            $table->timestamps(); 
            $table->foreign('organizers_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
