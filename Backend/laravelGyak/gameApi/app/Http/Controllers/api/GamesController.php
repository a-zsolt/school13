<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Games;
use App\Http\Requests\StoreGamesRequest;
use App\Http\Requests\UpdateGamesRequest;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Games::all();
        return response()->json([
            'success' => true,
            'message' => 'List of games',
            'data' => [ $games ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGamesRequest $request)
    {
        try {
            $game = Games::create($request->validated());
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Game created successfully',
            'data' => [
                $game
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Games $game)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => "Game {$game->id} data",
                'data'    => $game,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGamesRequest $request, Games $game)
    {
        try {
            $game->update($request->validated());
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Game updated successfully',
            'data' => [
                $game
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Games $game)
    {
        $game->delete();
        return response()->json([
            'success' => true,
            'message' => 'Game deleted successfully',
        ], 200);
    }
}
