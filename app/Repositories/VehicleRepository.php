<?php

namespace App\Repositories;

use App\Interfaces\VehicleInterface;

use App\Traits\ApiResponse;
use App\Traits\VehicleSortHandler;
use App\Traits\VehicleFilterHandler;
use App\Traits\TripFilterHandler;

use App\Models\Vehicle;

use App\Http\Resources\VehicleResource;
use App\Http\Resources\TripResource;

use App\Http\Requests\CreateVehicleRequest;

use Illuminate\Http\Request;

class VehicleRepository implements VehicleInterface
{
    use ApiResponse, VehicleFilterHandler, VehicleSortHandler, TripFilterHandler;

    public function index(Request $request)
    {
        $vehicles = Vehicle::query();

        $vehicles = $this->vehiclesFilter($request, $vehicles);

        $vehicles = $this->sort($request, $vehicles);

        return $this->response(
            'Vehicles list',
            200,
            [
                'vehicles' => VehicleResource::collection($vehicles->get())
            ]
        );
    }

    public function vehiclesTrip(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        if ($vehicle) {

            $trips = $vehicle->trips();

            $trips = $this->tripsFilter($request, $trips);

            $trips = $trips->orderBy('recoreded_at', 'desc')->get();

            return $this->response(
                'Vehicle trips',
                200,
                [
                    'trips' => TripResource::collection($trips)
                ]
            );
        }
        return $this->response('Vehicle not found',404);
    }

    public function create(CreateVehicleRequest $request)
    {

        $vehicle = Vehicle::create(['name' => $request->name]);

        if ($vehicle) {
            return $this->response(
                'Vehicle created successfully',
                201,
                [
                    'vehicle' => new VehicleResource($vehicle)
                ]
            );
        }
        return $this->response('Something went wrong', 500);
    }
}
