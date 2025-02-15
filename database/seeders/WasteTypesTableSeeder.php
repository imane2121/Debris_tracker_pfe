<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\WasteType;
use Illuminate\Support\Facades\DB;

class WasteTypesTableSeeder extends Seeder
{
    public function run()
    {
        // Step 1: Seed top-level waste types (general categories)
        $plastiques = WasteType::create([
            'name' => 'Plastiques',
            'parent_Type_Id' => null, // Top-level category
        ]);

        $metaux = WasteType::create([
            'name' => 'Métaux',
            'parent_type_id' => null, // Top-level category
        ]);

        $verre = WasteType::create([
            'name' => 'Verre',
            'parent_type_id' => null, // Top-level category
        ]);

        $dechetsDangereux = WasteType::create([
            'name' => 'Déchets dangereux',
            'parent_type_id' => null, // Top-level category
        ]);

        $materielPeche = WasteType::create([
            'name' => 'Matériel de pêche abandonné',
            'parent_type_id' => null, // Top-level category
        ]);

        // Step 2: Seed specific waste types (child categories)
        WasteType::create([
            'name' => 'Bouteilles en plastique',
            'parent_type_id' => $plastiques->id, // Child of "Plastiques"
        ]);

        WasteType::create([
            'name' => 'Emballages alimentaires',
            'parent_type_id' => $plastiques->id, // Child of "Plastiques"
        ]);

        WasteType::create([
            'name' => 'Sachets et sacs en plastique',
            'parent_type_id' => $plastiques->id, // Child of "Plastiques"
        ]);

        WasteType::create([
            'name' => 'Microplastiques',
            'parent_type_id' => $plastiques->id, // Child of "Plastiques"
        ]);

        WasteType::create([
            'name' => 'Canettes',
            'parent_type_id' => $metaux->id, // Child of "Métaux"
        ]);

        WasteType::create([
            'name' => 'Fragments de ferraille',
            'parent_type_id' => $metaux->id, // Child of "Métaux"
        ]);

        WasteType::create([
            'name' => 'Bouteilles en verre',
            'parent_type_id' => $verre->id, // Child of "Verre"
        ]);

        WasteType::create([
            'name' => 'Fragments de verre cassé',
            'parent_type_id' => $verre->id, // Child of "Verre"
        ]);

        WasteType::create([
            'name' => 'Piles et batteries',
            'parent_type_id' => $dechetsDangereux->id, // Child of "Déchets dangereux"
        ]);

        WasteType::create([
            'name' => 'Huiles usagées',
            'parent_type_id' => $dechetsDangereux->id, // Child of "Déchets dangereux"
        ]);

        WasteType::create([
            'name' => 'Contenants de produits chimiques',
            'parent_type_id' => $dechetsDangereux->id, // Child of "Déchets dangereux"
        ]);

        WasteType::create([
            'name' => 'Filets de pêche perdus',
            'parent_type_id' => $materielPeche->id, // Child of "Matériel de pêche abandonné"
        ]);

        WasteType::create([
            'name' => 'Cordes et lignes de pêche',
            'parent_type_id' => $materielPeche->id, // Child of "Matériel de pêche abandonné"
        ]);

        WasteType::create([
            'name' => 'Hameçons et plombs',
            'parent_type_id' => $materielPeche->id, // Child of "Matériel de pêche abandonné"
        ]);
    }
}