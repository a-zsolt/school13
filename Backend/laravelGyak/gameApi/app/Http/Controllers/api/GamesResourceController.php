<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGamesRequest;
use App\Http\Requests\UpdateGamesRequest;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Http\Resources\VehicleCollections;
use App\Models\Games;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class GamesResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GameCollection(Games::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGamesRequest $request)
    {
        $game = Games::create($request->validated());

        return (new GameResource($game))
            ->additional([
                'success' => true,
                'message' => 'Game created successfully',
            ])
            ->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Games $game)
    {
        return (new GameResource($game))
            ->additional([
                'success' => true,
                'message' => "Game {$game->id} data",
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGamesRequest $request, Games $game)
    {
        $game->update($request->validated());

        return (new GameResource($game))
            ->additional([
                'success' => true,
                'message' => "Game {$game->id} updated",
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Games $game)
    {
        $game->delete();

        return response()->json([
            'success' => true,
            'message' => 'Game deleted successfully'
        ], 200);
    }

    public function restore(int $game) {
        $game = Games::withTrashed()->find($game);
        $game->restore();
        return (new GameResource($game))
            ->additional([
                'success' => true,
                'message' => 'Game restored successfully'
            ]);
    }
}
