<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        schema::create('chats', function (blueprint $table){
            $table->id();
            $table->string('message',1000);
            $table->timestamps();
            $table->unsignedBiginteger('sender_id');
            $table->unsignedBiginteger('receiver_id');

            // Add foreign key constraints
            $table->foreign('sender_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
