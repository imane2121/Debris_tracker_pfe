<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CollecteSupervisor;

class CollecteSupervisorSeeder extends Seeder
{
    public function run()
    {
        CollecteSupervisor::create([
            'firstName' => 'Alice',
            'lastName' => 'Johnson',
            'email' => 'alice.johnson@example.com',
            'password' => bcrypt('password123'),
            'accountStatus' => 'active',
            'CNI' => 'CNI123456789',
            'profilePicture' => 'profile_pic_supervisor.jpg',
            'organisation' => 'EnviroTech',
            'region' => 'CASA',
        ]);
    }
}
