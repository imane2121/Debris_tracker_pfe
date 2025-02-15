<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Organisation;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    public function run()
    {
        // Environmental organizations with websites
        $organisations = [
            ['name' => 'WWF (World Wide Fund for Nature)'],
            ['name' => 'Greenpeace'],
            ['name' => 'The Ocean Cleanup'],
            ['name' => 'Associations locales pour la protection des plages et de l’environnement'],
            ['name' => 'Programme des Nations Unies pour l’Environnement (PNUE)'],
            ['name' => 'Surfrider Foundation Maroc'],
            ['name' => 'Sociétés spécialisées dans le recyclage des déchets'],
        ];

        // University departments and student organizations
        $studentOrganisations = [
            ['name' => 'Département de biologie marine'],
            ['name' => 'Faculté des sciences environnementales et biologiques'],
            ['name' => 'Club environnemental universitaire'],
            ['name' => 'Association des étudiants en ingénierie environnementale'],
            ['name' => 'Club de développement durable'],
        ];

        // Combine both arrays
        $allOrganisations = array_merge($organisations, $studentOrganisations);

        // Insert into the database
        foreach ($allOrganisations as $org) {
            Organisation::create($org);
        }
    }
}