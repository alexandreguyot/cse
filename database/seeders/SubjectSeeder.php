<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'id' => 1,
                'title' => 'Organiser Escape Game Février',
                'description' => '',
                'status' => 'in_progress',
                'priority' => 'high',
            ],
            [
                'id' => 2,
                'title' => 'Prime Lumine',
                'description' => '',
                'status' => 'in_progress',
                'priority' => 'medium',
            ],
            [
                'id' => 3,
                'title' => 'Sondage attentes des salariés',
                'description' => '',
                'status' => 'not_started',
                'priority' => 'low',
            ],
            [
                'id' => 4,
                'title' => 'Formation Economique',
                'description' => '',
                'status' => 'in_progress',
                'priority' => 'high',
            ],
            [
                'id' => 5,
                'title' => 'Formation CHSCT',
                'description' => '',
                'status' => 'not_started',
                'priority' => 'medium',
            ],
            [
                'id' => 6,
                'title' => 'Logiciel et messagerie interne',
                'description' => '',
                'status' => 'in_progress',
                'priority' => 'medium',
            ],
            [
                'id' => 7,
                'title' => 'Logiciel de trésorie',
                'description' => '',
                'status' => 'not_started',
                'priority' => 'low',
            ],
        ];
        Subject::insert($subjects);
    }
}
