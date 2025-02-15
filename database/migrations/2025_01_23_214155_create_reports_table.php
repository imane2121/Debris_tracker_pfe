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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collecte_id');
            $table->json('waste_types');
            $table->integer('volume');
            $table->timestamp('starting_date');
            $table->timestamp('end_date');
            $table->string('region');
            $table->string('location');
            $table->boolean('waste_types_validated')->default(false);
            $table->boolean('volume_validated')->default(false);
            $table->enum('export_format', ['PDF', 'CSV'])->default('PDF'); // Added export_format column
            $table->timestamps();
        
            // Foreign key
            $table->foreign('collecte_id')->references('id')->on('collectes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
