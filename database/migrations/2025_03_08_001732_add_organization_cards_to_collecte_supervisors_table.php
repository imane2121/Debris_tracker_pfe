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
        Schema::table('collecte_supervisors', function (Blueprint $table) {
            $table->string('front_organization_card')->after('organisation');
            $table->string('back_organization_card')->after('front_organization_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collecte_supervisors', function (Blueprint $table) {
            $table->dropColumn('front_organization_card');
            $table->dropColumn('back_organization_card');
        });
    }
}; 