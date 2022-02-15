<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Interfaces\VehicleInterface;

use App\Http\Requests\CreateVehicleRequest;

class VehiclesController extends Controller
{
    public function __construct(VehicleInterface $vehicleInterface)
    {
        $this->vehicleInterface = $vehicleInterface;
    }

    public function index(Request $request)
    {
        return $this->vehicleInterface->index($request);
    }

    public function vehiclesTrip(Request $request)
    {
        return $this->vehicleInterface->vehiclesTrip($request);
    }

    public function create(CreateVehicleRequest $request)
    {
        return $this->vehicleInterface->create($request);
    }
}
