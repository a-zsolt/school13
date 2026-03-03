<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'title' => "Tom Clancy's Rainbow Six® Siege",
                'release_year' => 2015,
                'developer' => 'Ubisoft',
                'genre' => 'Action',
                'score' => 82,
                'price' => 20
            ],
            [
                'title' => "Grand Theft Auto V",
                'release_year' => 2013,
                'developer' => 'Rockstar North',
                'genre' => 'Action',
                'score' => 87,
                'price' => 30
            ],
            [
                'title' => "The Last of Us",
                'release_year' => 2013,
                'developer' => 'Naughty Dog',
                'genre' => 'Adventure',
                'score' => 90,
                'price' => 60
            ]
        ];

        foreach ($games as $game) {
            Games::create($game);
        }
    }
}
