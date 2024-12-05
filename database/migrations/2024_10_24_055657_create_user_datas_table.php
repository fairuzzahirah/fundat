<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id')->index(); 
            $table->string('full_name', 80); 
            $table->string('phone', 15); 
            $table->string('username', 38)->nullable(); 
            // $table->unsignedBigInteger('rolement_id'); 
            
            $table->timestamps(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_datas');
    }
};
