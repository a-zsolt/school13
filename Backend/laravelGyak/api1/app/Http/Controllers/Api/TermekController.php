<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\termek;
use App\Http\Requests\StoretermekRequest;
use App\Http\Requests\UpdatetermekRequest;

class TermekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretermekRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(termek $termek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetermekRequest $request, termek $termek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(termek $termek)
    {
        //
    }
}
