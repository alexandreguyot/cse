<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'id' => 1,
                'title' => 'Pré-reserver le créneau 15/01',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Lancer le formulaire inscription',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 3,
                'title' => 'Valider réservation',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 4,
                'title' => "Relance Andréa sur l'organisation de la réunion",
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 5,
                'title' => 'Demander devis personnalisé à CELIADE',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ]
        ];
        Task::insert($tasks);
    }
}
