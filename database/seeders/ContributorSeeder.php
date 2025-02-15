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
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'phoneNumber' => '1234567890',
            'password' => bcrypt('password123'),
            'username' => 'johndoe',
            'accountStatus' => 'active',
            'profilePicture' => 'profile.jpg',
            'credibilityScore' => 95.50,
        ]);

        Contributor::create([
            'firstName' => 'Jane',
            'lastName' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phoneNumber' => '0987654321',
            'password' => bcrypt('password123'),
            'username' => 'janesmith',
            'accountStatus' => 'active',
            'profilePicture' => 'profile.jpg',
            'credibilityScore' => 85.00,
        ]);
    }
}
