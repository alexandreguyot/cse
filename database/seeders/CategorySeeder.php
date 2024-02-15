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
                'title'           => 'Activités sociales et culturelles',
                'description'         => '',
            ],
            [
                'id'             => 2,
                'title'           => 'Santé, Sécurité et Conditions de travail',
                'description'         => '',
            ],
            [
                'id'             => 3,
                'title'           => 'Trésorerie du CSE',
                'description'         => '',
            ],
            [
                'id'             => 4,
                'title'           => 'Réclamations',
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
