<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contributor;
class ContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Contributor::create([
            'firstName' => 'Imane',
            'lastName' => 'El markhi',
            'email' => 'imane11@gmail.com',
            'phoneNumber' => '1234567890',
            'password' => bcrypt('password123'),
            'username' => 'Faith',
            'accountStatus' => 'active',
            'profilePicture' => 'profile.jpg',
            'credibilityScore' => 95.50,
        ]);

        Contributor::create([
            'firstName' => 'nouhaila',
            'lastName' => 'ghandour',
            'email' => 'nouhaila1@gmail.com',
            'phoneNumber' => '0987654321',
            'password' => bcrypt('password123'),
            'username' => 'nounou',
            'accountStatus' => 'active',
            'profilePicture' => 'profile.jpg',
            'credibilityScore' => 85.00,
        ]);
    }
}
