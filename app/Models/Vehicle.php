<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    const VALID_SORT_BY_COLUMNS = [
        'id',
        'name',
        'created_at',
        'trips_count'
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
