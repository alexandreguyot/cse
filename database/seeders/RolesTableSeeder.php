<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Titulaire CSE',
            ],
            [
                'id'    => 2,
                'title' => 'Suppléant CSE',
            ],
        ];

        Role::insert($roles);
    }
}
