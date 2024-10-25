<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kontraprestasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('icon_photo_kontraprestasis_id')->index(); // FK ke tabel icon_photo_kontraprestasis
            $table->unsignedBigInteger('events_id')->index(); // FK ke tabel event
            $table->string('title', 100);
            $table->integer('min_sponsor');
            $table->integer('max_sponsor');
            $table->string('feedback', 500);
            $table->timestamps();

            // Foreign keys
            $table->foreign('icon_photo_kontraprestasis_id')
                  ->references('id')->on('icon_photo_kontraprestasis')
                  ->onDelete('cascade');

            $table->foreign('events_id')
                  ->references('id')->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontraprestasis');
    }
};