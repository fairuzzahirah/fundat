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
        schema::create('kontraprestasi_evidences', function(blueprint $table){
            $table->id();
            $table->unsignedBigInteger('sponsors_id')->index();
            $table->string('photo_file');
            $table->text('description')->nullable;

            $table->timestamps();
            $table->foreign('sponsors_id')->references('id')->on('sponsors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraprestasi_evidences');
    }
};
