<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Alexandre Guyot',
                'email'          => 'alexandre.guyot@wiztivi.fr',
                'password'       => bcrypt('aguyot'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 2,
                'name'           => 'Fabien Roue',
                'email'          => 'fabien.route@wiztivi.fr',
                'password'       => bcrypt('froue'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 3,
                'name'           => 'Fabienne Gueriteau',
                'email'          => 'fabienne.gueriteau@wiztivi.fr',
                'password'       => bcrypt('fgueriteau'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 4,
                'name'           => 'Marine Guffroy',
                'email'          => 'marine.guffroy@wiztivi.fr',
                'password'       => bcrypt('mguffroy'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 5,
                'name'           => 'Maria Ciugurean',
                'email'          => 'maria.ciugurea@wiztivi.fr',
                'password'       => bcrypt('mciugurean'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 6,
                'name'           => 'Franck Isambert',
                'email'          => 'franch.isambert@wiztivi.fr',
                'password'       => bcrypt('fisambert'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 7,
                'name'           => 'Alice Braye',
                'email'          => 'alice.braye@wiztivi.fr',
                'password'       => bcrypt('abraye'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 8,
                'name'           => 'Trystan Valentin',
                'email'          => 'trystan.valentin@wiztivi.fr',
                'password'       => bcrypt('tvalentin'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 9,
                'name'           => 'Chris Jurgens',
                'email'          => 'chris.jurgens@wiztivi.fr',
                'password'       => bcrypt('cjurgens'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 10,
                'name'           => 'Guillaume Falcini',
                'email'          => 'guillaume.falcini@wiztivi.fr',
                'password'       => bcrypt('gfalcini'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 11,
                'name'           => 'Alexandre Greleaud',
                'email'          => 'alexandre.greleaud@wiztivi.fr',
                'password'       => bcrypt('agreleaud'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 12,
                'name'           => 'Séverine Lebrun',
                'email'          => 'severine.lebrun@wiztivi.fr',
                'password'       => bcrypt('slebrun'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 13,
                'name'           => 'Damien Chemineau',
                'email'          => 'damien.chemineau@wiztivi.fr',
                'password'       => bcrypt('dchemineau'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
            [
                'id'             => 14,
                'name'           => 'Yoann Durassier',
                'email'          => 'yoann.durassier@wiztivi.fr',
                'password'       => bcrypt('ydurassier'),
                'remember_token' => null,
                'locale'         => 'fr',
            ],
        ];

        User::insert($users);
    }
}
