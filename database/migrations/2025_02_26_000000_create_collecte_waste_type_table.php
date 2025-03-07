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
        Schema::create('collecte_waste_type', function (Blueprint $table) {
            $table->unsignedBigInteger('collecte_id');
            $table->unsignedBigInteger('waste_type_id');
        
            // Primary key
            $table->primary(['collecte_id', 'waste_type_id']);
        
            // Foreign keys
            $table->foreign('collecte_id')->references('id')->on('collectes')->onDelete('cascade');
            $table->foreign('waste_type_id')->references('id')->on('waste_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collecte_waste_type');
    }
}; 