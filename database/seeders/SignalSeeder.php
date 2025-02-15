<?php
namespace Database\Seeders;
use App\Models\Signal;
use Illuminate\Database\Seeder;

class SignalSeeder extends Seeder
{
    public function run()
    {
        // Example signals focused on Morocco
        Signal::create([
            'contributorId' => 1, // Contributor ID
            'volume' => 10, // Estimated volume of waste
            'wasteTypes' => json_encode([6, 7]), // IDs of specific waste types (e.g., Bouteilles en plastique, Emballages alimentaires)
            'location' => 'Plage de Rabat', // Moroccan location
            'latitude' => 34.020882, // Latitude of Rabat beach
            'longitude' => -6.841650, // Longitude of Rabat beach
            'status' => 'pending', // Signal status
            'anomalyFlag' => false, // No anomaly
        ]);

        Signal::create([
            'contributorId' => 2, // Contributor ID
            'volume' => 5, // Estimated volume of waste
            'wasteTypes' => json_encode([10, 12]), // IDs of specific waste types (e.g., Canettes, Bouteilles en verre)
            'location' => 'Plage de Casablanca', // Moroccan location
            'latitude' => 33.573110, // Latitude of Casablanca beach
            'longitude' => -7.589843, // Longitude of Casablanca beach
            'status' => 'validated', // Signal status
            'anomalyFlag' => false, // No anomaly
        ]);

        Signal::create([
            'contributorId' => 1, // Contributor ID
            'volume' => 15, // Estimated volume of waste
            'wasteTypes' => json_encode([17, 18]), // IDs of specific waste types (e.g., Filets de pêche perdus, Cordes et lignes de pêche)
            'location' => 'Plage d\'Agadir', // Moroccan location
            'latitude' => 30.427755, // Latitude of Agadir beach
            'longitude' => -9.598107, // Longitude of Agadir beach
            'status' => 'pending', // Signal status
            'anomalyFlag' => true, // Flagged for anomaly
        ]);
    }
}