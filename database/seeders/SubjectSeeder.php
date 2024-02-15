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
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Prime Lumine',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 3,
                'title' => 'Sondage attentes des salariés',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 4,
                'title' => 'Formation Economique',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 5,
                'title' => 'Formation CHSCT',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 6,
                'title' => 'Logiciel et messagerie interne',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
            [
                'id' => 7,
                'title' => 'Logiciel de trésorie',
                'description' => '',
                'status' => 1,
                'priority' => 1,
            ],
        ];
        Subject::insert($subjects);
    }
}
