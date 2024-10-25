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
        Schema::create('event_category_names', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 50); 
            $table->unsignedBigInteger('parent_id')->nullable(); // parent_id int NULL
            $table->string('icon', 20); 

            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('event_category_names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_category_names');
    }
};
