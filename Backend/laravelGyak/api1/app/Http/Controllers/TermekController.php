<?php

namespace App\Http\Controllers;

use App\Models\Termek;
use Illuminate\Http\Request;

class TermekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termekek = Termek::all();
        return view('termek.index', [
            'termekek' => $termekek,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('termek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Termek::create($request->validated());
        return redirect()->route('termekek.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Termek $termek)
    {
        return view('termek.show', [
            'termek' => $termek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Termek $termek)
    {
        return view('termek.edit', [
            'termek' => $termek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Termek $termek)
    {
        Termek::update($request->validated());
        return redirect()->route('termekek.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Termek $termek)
    {
        $termek->delete();
        return redirect()->route('termekek.index');
    }
}
