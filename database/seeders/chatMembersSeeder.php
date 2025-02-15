<?php 
namespace Database\Seeders;
use App\Models\ChatMembers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChatMembersSeeder extends Seeder
{
    public function run()
    {
        ChatMembers::create([
            'chat_id' => 1,
            'user_id' => 1, // Supervisor/Admin
            'user_type' => 'Supervisor',
        ]);

        ChatMembers::create([
            'chat_id' => 1,
            'user_id' => 2, // Contributor
            'user_type' => 'Contributor',
        ]);
    }
}