<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatLngToCollectesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('collectes', function (Blueprint $table) {
            // Add latitude and longitude columns
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collectes', function (Blueprint $table) {
            // Drop latitude and longitude columns
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
}
