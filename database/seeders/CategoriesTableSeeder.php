<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ajouter les données de catégorie
        Categorie::updateOrCreate(['name' => 'Catégorie 1', 'description' => 'Catégorie 1 description']);
        Categorie::updateOrCreate(['name' => 'Catégorie 2', 'description' => 'Catégorie 2 description']);
        Categorie::updateOrCreate(['name' => 'Catégorie 3', 'description' => 'Catégorie 3 description']);
    }
}
