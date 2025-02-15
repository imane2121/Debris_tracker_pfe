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
        Schema::create('ai_detections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('signal_id');
            $table->boolean('is_debris_detected')->default(false);
            $table->json('detection_type')->nullable();
            $table->decimal('confidence_level', 5, 2)->nullable();
            $table->timestamp('detection_date')->useCurrent();
            $table->timestamps();
        
            // Foreign key
            $table->foreign('signal_id')->references('id')->on('signals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   Schema::table('ai_detections', function (Blueprint $table) {
        //Drop foreign key before dropping the table
        $table->dropForeign(['signal_id']);
    });
        Schema::dropIfExists('a_i_detections');
    }
};
