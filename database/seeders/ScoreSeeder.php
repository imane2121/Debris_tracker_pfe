<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;
class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Score::create([
            'scoreCollecte' => 50, // Points for collecte participation
            'scoreSignal' => 30, // Points for reporting waste
            'contributorId' => 1, // Contributor ID
        ]);

        Score::create([
            'scoreCollecte' => 20, // Points for collecte participation
            'scoreSignal' => 10, // Points for reporting waste
            'contributorId' => 2, // Contributor ID
        ]);    }
}
