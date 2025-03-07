<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update collectes table
        Schema::table('collectes', function (Blueprint $table) {
            // Drop old foreign keys
            $table->dropForeign(['collecte_supervisor_id']);
            $table->dropForeign(['admin_id']);
            
            // Add new foreign keys
            $table->foreign('collecte_supervisor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
        });

        // Update signals table
        Schema::table('signals', function (Blueprint $table) {
            // Drop old foreign key
            $table->dropForeign(['contributorId']);
            
            // Add new foreign key
            $table->foreign('contributorId')->references('id')->on('users')->onDelete('cascade');
        });

        // Update messages table
        Schema::table('messages', function (Blueprint $table) {
            // Drop old foreign keys
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['supervisor_id']);
            
            // Add new foreign keys
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Update chats table
        Schema::table('chats', function (Blueprint $table) {
            // Drop old foreign keys
            $table->dropForeign(['user_one_id']);
            $table->dropForeign(['user_two_id']);
            
            // Add new foreign keys
            $table->foreign('user_one_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_two_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Update scores table
        Schema::table('scores', function (Blueprint $table) {
            // Drop old foreign key
            $table->dropForeign(['contributorId']);
            
            // Add new foreign key
            $table->foreign('contributorId')->references('id')->on('users')->onDelete('cascade');
        });

        // Update notifications table
        Schema::table('notifications', function (Blueprint $table) {
            // Drop old foreign key
            $table->dropForeign(['receiver_id']);
            
            // Add new foreign key
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Revert collectes table
        Schema::table('collectes', function (Blueprint $table) {
            $table->dropForeign(['collecte_supervisor_id']);
            $table->dropForeign(['admin_id']);
            
            $table->foreign('collecte_supervisor_id')->references('id')->on('collecte_supervisors')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('administrators')->onDelete('set null');
        });

        // Revert signals table
        Schema::table('signals', function (Blueprint $table) {
            $table->dropForeign(['contributorId']);
            $table->foreign('contributorId')->references('id')->on('contributors')->onDelete('cascade');
        });

        // Revert messages table
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['supervisor_id']);
            
            $table->foreign('sender_id')->references('id')->on('contributors')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('collecte_supervisors')->onDelete('cascade');
        });

        // Revert chats table
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign(['user_one_id']);
            $table->dropForeign(['user_two_id']);
            
            $table->foreign('user_one_id')->references('id')->on('contributors')->onDelete('cascade');
            $table->foreign('user_two_id')->references('id')->on('contributors')->onDelete('cascade');
        });

        // Revert scores table
        Schema::table('scores', function (Blueprint $table) {
            $table->dropForeign(['contributorId']);
            $table->foreign('contributorId')->references('id')->on('contributors')->onDelete('cascade');
        });

        // Revert notifications table
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['receiver_id']);
            $table->foreign('receiver_id')->references('id')->on('contributors')->onDelete('cascade');
        });
    }
}; 