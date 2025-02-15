<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Import all seeders
use Database\Seeders\AdministratorSeeder;
use Database\Seeders\AIDetectionSeeder;
use Database\Seeders\ArticlesSeeder;
use Database\Seeders\ChatSeeder;
use Database\Seeders\ChatMembersSeeder;
use Database\Seeders\CollecteSeeder;
use Database\Seeders\CollecteSupervisorSeeder;
use Database\Seeders\ContributorSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\NotificationsSeeder; // Fixed incorrect import
use Database\Seeders\OrganisationSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\ReportSeeder;
use Database\Seeders\ScoreSeeder;
use Database\Seeders\SignalSeeder;
use Database\Seeders\WasteTypeSeeder;
// Ensure these seeders exist before using them
use Database\Seeders\SignalWasteTypeSeeder; 
use Database\Seeders\ReportParticipantsSeeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WasteTypesTableSeeder::class,
            RegionSeeder::class,
            OrganisationSeeder::class,
            AdministratorSeeder::class,
            ContributorSeeder::class,
            CollecteSupervisorSeeder::class,
            CollecteSeeder::class,
            SignalSeeder::class,
            AIDetectionSeeder::class,
            ReportSeeder::class,
            ArticlesSeeder::class,
            Notifications::class, // Fixed class name
            MessageSeeder::class,
            ChatSeeder::class,
            chatMembersSeeder::class, // Fixed case issue
            ScoreSeeder::class,
            MediaSeeder::class,
        ]);
    }
}
