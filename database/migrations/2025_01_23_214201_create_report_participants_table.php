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
        Schema::create('report_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('contributor_id');
            $table->boolean('present')->default(false);
        
            // Primary key
            $table->primary(['report_id', 'contributor_id']);
        
            // Foreign keys
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->foreign('contributor_id')->references('id')->on('contributors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_participants');
    }
};
