<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{


    public function index($sort = null) {
        $sort_whitelist = ['name', 'type', 'daily_price', 'seats', 'is_available'];

        $sort = in_array($sort, $sort_whitelist) ? $sort : 'daily_price';

        $vehicles = Vehicle::orderBy($sort, 'asc')->get();

        $stats = $this->statistics($vehicles);

        return view('vehicles.index', ['vehicles' => $vehicles, 'stats' => $stats, 'sort' => $sort]);
    }

    private function statistics($vehicles)
    {
        $numOfVehicles = count($vehicles);
        $availableVehicles = 0;
        $unavailableVehicles = 0;

        foreach ($vehicles as $vehicle) {
            if ($vehicle->is_available) {
                $availableVehicles++;
            } else {
                $unavailableVehicles++;
            }
        }

        return ['numOfVehicles' => $numOfVehicles ,'availableVehicles' => $availableVehicles, 'unavailableVehicles' => $unavailableVehicles];
    }

    public function show($id) {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicles.show', ['vehicle' => $vehicle]);
    }
}
