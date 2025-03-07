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
            if (!Schema::hasColumn('collecte_supervisors', 'front_organization_card')) {
                $table->string('front_organization_card')->nullable();
            }
            if (!Schema::hasColumn('collecte_supervisors', 'back_organization_card')) {
                $table->string('back_organization_card')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collecte_supervisors', function (Blueprint $table) {
            $table->dropColumn(['front_organization_card', 'back_organization_card']);
        });
    }
};
