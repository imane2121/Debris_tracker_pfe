<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToCollectesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('collectes', function (Blueprint $table) {
            // Add the image column after the location column
            $table->string('image')->nullable()->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collectes', function (Blueprint $table) {
            // Drop the image column if the migration is rolled back
            $table->dropColumn('image');
        });
    }
}
