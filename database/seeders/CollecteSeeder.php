<?php
namespace Database\Seeders;
use App\Models\Collecte;
use Illuminate\Database\Seeder;

class CollecteSeeder extends Seeder
{
    public function run()
    {
        Collecte::create([
            'signal_id' => 4, // Link to a signal
            'collecte_supervisor_id' => 1, // Supervisor ID
            'region' => 'Rabat-Salé-Kénitra', // Moroccan region
            'location' => 'Plage de Rabat', // Moroccan location
            'status' => 'in_progress', // Collecte status
            'starting_date' => now(), // Starting date
            'end_date' => now()->addDays(2), // End date
        ]);

        Collecte::create([
            'signal_id' => 6, // Link to a signal
            'collecte_supervisor_id' => 1, // Supervisor ID
            'region' => 'Casablanca-Settat', // Moroccan region
            'location' => 'Plage de Casablanca', // Moroccan location
            'status' => 'validated', // Collecte status
            'starting_date' => now()->subDays(5), // Starting date
            'end_date' => now()->subDays(3), // End date
        ]);

        Collecte::create([
            'signal_id' => 5, // Link to a signal
            'collecte_supervisor_id' => 2, // Supervisor ID
            'region' => 'Souss-Massa', // Moroccan region
            'location' => 'Plage dAgadir', // Moroccan location
            'status' => 'in_progress', // Collecte status
            'starting_date' => now()->addDays(7), // Starting date
            'end_date' => now()->addDays(9), // End date
        ]);
    }
}
