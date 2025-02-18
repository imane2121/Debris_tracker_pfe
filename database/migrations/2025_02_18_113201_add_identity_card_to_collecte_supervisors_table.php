<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('collecte_supervisors', function (Blueprint $table) {
            $table->json('identityCard')->nullable()->after('CNI'); // Adjust column placement
        });
    }

    public function down()
    {
        Schema::table('collecte_supervisors', function (Blueprint $table) {
            $table->dropColumn('identityCard');
        });
    }
};
