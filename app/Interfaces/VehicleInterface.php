<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\CreateVehicleRequest;

interface VehicleInterface
{
    public function index(Request $request);

    public function create(CreateVehicleRequest $request);

    public function vehiclesTrip(Request $request);
}
