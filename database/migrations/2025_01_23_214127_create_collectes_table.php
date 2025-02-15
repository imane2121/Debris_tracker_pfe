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
        Schema::create('collectes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('signal_id');
            $table->unsignedBigInteger('collecte_supervisor_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('region');
            $table->string('location');
            $table->enum('status', ['in_progress', 'completed', 'validated', 'cancelled'])->default('in_progress');
            $table->timestamp('starting_date');
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('signal_id')->references('id')->on('signals')->onDelete('cascade');
            $table->foreign('collecte_supervisor_id')->references('id')->on('collecte_supervisors')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('administrators')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectes');
    }
};
