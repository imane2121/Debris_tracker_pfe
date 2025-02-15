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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_one_id');
            $table->unsignedBigInteger('user_two_id');
            $table->unsignedBigInteger('collecte_id'); // Add the collecte_id column
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('user_one_id')->references('id')->on('contributors')->onDelete('cascade');
            $table->foreign('user_two_id')->references('id')->on('contributors')->onDelete('cascade');
            $table->foreign('collecte_id')->references('id')->on('collectes')->onDelete('cascade'); // Foreign key for collecte_id
        
            // Unique chat between two participants
            $table->unique(['user_one_id', 'user_two_id']);
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
