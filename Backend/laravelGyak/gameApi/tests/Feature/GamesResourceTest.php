<?php

namespace Tests\Feature;

use App\Models\Games;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GamesResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_game_returns_correct_resource_structure()
    {
        $game = Games::create([
            'title' => 'Test Game',
            'release_year' => 2024,
            'developer' => 'Test Dev',
            'genre' => 'Action',
            'score' => 90,
            'price' => 59.99
        ]);

        $response = $this->getJson("/api/games/{$game->id}");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'release_year',
                'developer',
                'genre',
                'score',
                'price'
            ],
            'success',
            'message'
        ]);

        $response->assertJsonFragment(['message' => "Game {$game->id} data"]);
    }

    public function test_index_returns_game_collection()
    {
        Games::create([
            'title' => 'Test Game 1',
            'release_year' => 2024,
            'developer' => 'Test Dev',
            'genre' => 'Action',
            'score' => 90,
            'price' => 59.99
        ]);

        $response = $this->getJson("/api/games");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'games' => [
                    '*' => [
                        'id', 'title', 'release_year', 'developer', 'genre', 'score', 'price'
                    ]
                ]
            ],
            'success',
            'message'
        ]);
    }
}
