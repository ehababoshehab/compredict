<?php

namespace Tests\Feature;

use App\Models\Vehicle;
use DB;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateVehicleTest extends TestCase
{
    private static $url = '/api/vehicles';

    public function tearDown(): void
    {
        try {
            DB::statement('
                DELETE FROM vehicles WHERE name = "MyAmazingVehicle";
            ');
        } catch (Exception $e) {
            throw $e;
        }

        parent::tearDown();
    }

    public function testCorrectScenario()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
            ])->json('POST', self::$url, [
                'name' => 'MyAmazingVehicle'
            ]);

        $response
            ->assertStatus(201)
            ->assertSeeText('Vehicle created successfully')
            ->assertJson(fn (AssertableJson $json) => $json->has('message')
                ->has('data')
                ->where('data.vehicle.name', 'MyAmazingVehicle'));
    }

    public function testUniqueScenario() {
        Vehicle::create(['name' => 'MyAmazingVehicle']);
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
            ])->json('POST', self::$url, [
                'name' => 'MyAmazingVehicle'
            ]);

        $response
            ->assertStatus(422)
            ->assertJson(fn (AssertableJson $json) => $json->has('message')
                ->has('message')
                ->where('message.name.0', 'Vehicle name already exists in our system.'));
    }

    public function testRequiredScenario() {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
            ])->json('POST', self::$url, [
                'name' => ''
            ]);

        $response
            ->assertStatus(422)
            ->assertJson(fn (AssertableJson $json) => $json->has('message')
                ->has('message')
                ->where('message.name.0', 'Vehicle name can not be empty.'));
    }
}
