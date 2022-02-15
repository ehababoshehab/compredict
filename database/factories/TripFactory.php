<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Vehicle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $recordedAt = $this->faker->dateTimeBetween('-2 years', 'now');

        return [
            'vehicle_id' => rand(1, Vehicle::count()),
            'mileage' => rand(50000.00, 200000.99),
            'recoreded_at' => $recordedAt,
            'created_at' => $recordedAt,
            'updated_at' => $recordedAt
        ];
    }
}
