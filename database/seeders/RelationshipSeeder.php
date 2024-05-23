<?php

namespace Database\Seeders;

use App\Models\RelationShip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pariente = array(
            "Hijo(a)",
            "Nieto(a)",
            "Hermano(a)",
            "Sobrino(a)",
            "Primo(a)",
        );


        foreach ($pariente as $prefix) {
            RelationShip::create([
                'name' => $prefix,
            ]);
        }
    }
}