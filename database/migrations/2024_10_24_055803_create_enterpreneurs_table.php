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
        schema::create('enterpreneurs', function (blueprint $table){
            $table->id();
            $table->unsignedBiginteger('mitras_id')->index();
            $table->unsignedBigInteger('users_id')->index();


            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mitras_id')->references('id')->on('mitras')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterpreneurs');
    }
};
