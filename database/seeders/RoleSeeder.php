<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        Role::create(['title' => 'admin']);
        Role::create(['title' => 'contributor']);
        Role::create(['title' => 'supervisor']);
    }
} 