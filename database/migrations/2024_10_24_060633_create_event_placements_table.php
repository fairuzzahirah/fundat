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
        Schema::create('event_placements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('events_id')->index();
            $table->date('event_start_date');
            $table->date('event_end_date');
            $table->string('event_venue',200);
            $table->text('address');
            $table->string('city',100);
            $table->string('province',100);

            $table->timestamps();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_placements');
    }
};
