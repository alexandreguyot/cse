<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id'             => 1,
                'title'           => 'Activités CE',
                'description'         => '',
            ],
            [
                'id'             => 2,
                'title'           => 'CHSCT',
                'description'         => '',
            ],
            [
                'id'             => 3,
                'title'           => 'Compte et trésorerie',
                'description'         => '',
            ],
            [
                'id'             => 4,
                'title'           => 'DP',
                'description'         => '',
            ]
            ,
            [
                'id'             => 5,
                'title'           => 'Fonctionnement interne',
                'description'         => '',
            ]
        ];

        Category::insert($categories);
    }
}
