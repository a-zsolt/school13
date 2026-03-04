<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleCollections;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new VehicleCollections(Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create($request->validated());

        return (new VehicleCollections($vehicle))
            ->additional([
                'success' => true,
                'message' => 'Vehicle created successfully',
            ])
            ->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return (new VehicleCollections($vehicle))
            ->additional([
                'success' => true,
                'message' => "Vehicle {$vehicle->id} data",
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());

        return (new VehicleCollections($vehicle))
            ->additional([
                'success' => true,
                'message' => "Vehicle {$vehicle->id} updated",
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle deleted successfully'
        ], 200);
    }

    public function restore(int $vehicle) {
        $vehicle = Vehicle::withTrashed()->find($vehicle);
        $vehicle->restore();
        return (new VehicleCollections($vehicle))
            ->additional([
                'success' => true,
                'message' => 'Vehicle restored successfully'
            ]);
    }
}
