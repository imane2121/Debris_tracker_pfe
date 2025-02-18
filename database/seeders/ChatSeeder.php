<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chat;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Example 1: Inserting a chat with valid user IDs
        Chat::create([
            'user_one_id' => 1, // Provide a valid user ID for user_one
            'user_two_id' => 2, // Provide a valid user ID for user_two
            'collecte_id' => 8, // Link to a collecte
        ]);

        // Example 2: Inserting another chat
        Chat::create([
            'user_one_id' => 1, // Provide a valid user ID for user_one
            'user_two_id' => 3, // Provide a valid user ID for user_two
            'collecte_id' => 7, // Link to a collecte
        ]);
    }
}

