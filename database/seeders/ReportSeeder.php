<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run()
    {
        Report::create([
            'collecte_id' => 3, // Link to a collecte
            'waste_types' => json_encode([6, 7]), // IDs of specific waste types
            'volume' => 10, // Volume of waste collected
            'starting_date' => now(), // Starting date
            'end_date' => now()->addDays(2), // End date
            'region' => 'Rabat-Salé-Kénitra', // Moroccan region
            'location' => 'Plage de Rabat', // Moroccan location
            'waste_types_validated' => true, // Waste types validated
            'volume_validated' => true, // Volume validated
            'export_format' => 'PDF', // Export format
        ]);

        Report::create([
            'collecte_id' => 2, // Link to a collecte
            'waste_types' => json_encode([10, 12]), // IDs of specific waste types
            'volume' => 5, // Volume of waste collected
            'starting_date' => now()->subDays(5), // Starting date
            'end_date' => now()->subDays(3), // End date
            'region' => 'Casablanca-Settat', // Moroccan region
            'location' => 'Plage de Casablanca', // Moroccan location
            'waste_types_validated' => true, // Waste types validated
            'volume_validated' => true, // Volume validated
            'export_format' => 'CSV', // Export format
        ]);
    }
}
