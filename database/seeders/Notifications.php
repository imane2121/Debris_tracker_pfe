<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification;
class Notifications extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        notification::create([
            'receiver_id' => 1, // Contributor ID
            'message' => 'Your report for Plage de Rabat has been validated.',
            'type' => 'alert', // Notification type
            'is_read' => false, // Unread
        ]);

        notification::create([
            'receiver_id' => 2, // Contributor ID
            'message' => 'A new collection is planned at Plage d\'Agadir.',
            'type' => 'collection_planned', // Notification type
            'is_read' => false, // Unread
        ]);
    }
}
