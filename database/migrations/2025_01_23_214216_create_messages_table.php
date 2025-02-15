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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collecte_id')->nullable();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->enum('sender_type', ['Contributor', 'Supervisor']);
            $table->text('content');
            $table->boolean('read_status')->default(false);
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('collecte_id')->references('id')->on('collectes')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('contributors')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('collecte_supervisors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
