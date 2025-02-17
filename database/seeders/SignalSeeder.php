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
            'contributorId' => 2, // Contributor ID
            'volume' => 5, // Estimated volume of waste
            'wasteTypes' => json_encode([10, 12]), // IDs of specific waste types (e.g., Canettes, Bouteilles en verre)
            'location' => 'Plage de Casablanca', // Moroccan location
            'latitude' => 33.573110, // Latitude of Casablanca beach
            'longitude' => -7.589843, // Longitude of Casablanca beach
            'status' => 'validated', // Signal status
            'customType' => 'petrole',
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
            'customType' => 'validated',
            'anomalyFlag' => true, // Flagged for anomaly
        ]);
        Signal::create([
            'contributorId' => 4, 
            'volume' => 12, 
            'wasteTypes' => json_encode([17, 18]), 
            'location' => 'Plage de Taghazout, Agadir', 
            'latitude' => 30.545100, 
            'longitude' => -9.712400, 
            'customType' => 'petrole',
            'status' => 'validated', 
            'anomalyFlag' => true, 
        ]);

        Signal::create([
            'contributorId' => 6, 
            'volume' => 8, 
            'wasteTypes' => json_encode([3, 5]), 
            'location' => 'Plage de Saïdia', 
            'latitude' => 35.107600, 
            'longitude' => -2.249720, 
            'customType' => 'petrole',
            'status' => 'validated', 
            'anomalyFlag' => false, 
        ]);

        Signal::create([
            'contributorId' => 5, 
            'volume' => 20, 
            'wasteTypes' => json_encode([1, 9]), 
            'location' => 'Plage de Dakhla', 
            'latitude' => 23.688000, 
            'longitude' => -15.948000, 
            'customType' => 'petrole',
            'status' => 'validated', 
            'anomalyFlag' => true, 
        ]);
    
    }
}