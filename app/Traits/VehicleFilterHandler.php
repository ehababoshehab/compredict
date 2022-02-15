<?php

namespace App\Traits;

trait VehicleFilterHandler
{
    public function vehiclesFilter($request, $vehicles)
    {
        $nameFilter = $request->name ?? null;
        if ($nameFilter) {
            $vehicles = $vehicles->where('name', 'like', '%'.$nameFilter.'%');
        }

        return $vehicles;
    }
}
