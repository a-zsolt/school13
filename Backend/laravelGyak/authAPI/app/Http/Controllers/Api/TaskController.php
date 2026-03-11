<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "tasks";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->user()->tokenCan('manager')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return "task created";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (!$request->user()->tokenCan('admin')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return "task deleted";
    }
}
