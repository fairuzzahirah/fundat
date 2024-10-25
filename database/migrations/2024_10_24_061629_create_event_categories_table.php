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
        Schema::create('event_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('events_id')->index();
            $table->unsignedBigInteger('event_category_names_id')->index();

            $table->timestamps();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('event_category_names_id')->references('id')->on('event_category_names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_categories');  
    }
};
