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
        Schema::create('icon_photo_kontraprestasis', function (Blueprint $table) {
            $table->id();
            $table->string('photo_file', 191); // Path atau nama file gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('icon_photo_kontraprestasis');
    }
};
