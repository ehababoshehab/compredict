<?php

namespace App\Traits;

trait TripFilterHandler
{
    public function tripsFilter($request, $trips)
    {
        $recordedAtFilter = $request->recoreded_at ?? null;
        if ($recordedAtFilter) {
            $trips = $trips->where('recoreded_at', 'like', '%'.$recordedAtFilter.'%');
        }

        return $trips;
    }
}
