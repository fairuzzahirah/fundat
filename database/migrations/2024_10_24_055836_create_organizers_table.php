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
        schema::create('organizers', function(blueprint $table){
            $table->id();
            $table->unsignedBigInteger('users_id')->index();
            $table->unsignedBiginteger('organizations_id')->index();

            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organizations_id')->references('id')->on('organizations')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
