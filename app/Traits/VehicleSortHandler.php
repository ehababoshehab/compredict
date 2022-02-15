<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Models\Vehicle;

trait VehicleSortHandler
{
    public function sort($request, $vehicles)
    {
        $sortBy = $request->sort_by ?? 'created_at';
        $sortDirection = $request->sort_direction == 'asc' ? 'asc' : 'desc';

        if (in_array($sortBy, Vehicle::VALID_SORT_BY_COLUMNS)) {
            if ($sortBy == 'trips_count') {
                $vehicles = $vehicles->withCount('trips');
            }
            $vehicles = $vehicles->orderBy($sortBy, $sortDirection);
        }

        return $vehicles;
    }
}
