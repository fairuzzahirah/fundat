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
        schema::create('organizations', function(blueprint $table){
            $table->id();
            $table->string('name',100);
            $table->text('address');
            $table->text('description');
            $table->string('city',191);
            $table->string('province',191);
            $table->string('photo_file',191);

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
