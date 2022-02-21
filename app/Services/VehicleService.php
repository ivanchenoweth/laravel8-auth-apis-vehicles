<?php

namespace App\Services;

use App\Models\Vehicle;
use App\Services\SedanService;
use App\Services\MotorCycleService;

/**
 * Class VehicleService
 * @package App\Services
 */
class VehicleService
{

    private $tires;
    private $motorpower;

    function createVehicle()
    {
        return new Vehicle();
    }

    function create($request)
    {
        // TODO - Simple factory pattern to be more scalable
        // https://phptherightway.com/pages/Design-Patterns.html
        if (strcasecmp($request["type"], "sedan") == 0) {
            $vehicle = new SedanService();
            return $vehicle->create($request);
        }
        if (strcasecmp($request["type"], "MotorCycle") == 0) {
            
            $vehicle = new MotorCycleService();
            return $vehicle->create($request);
        }

        return false; // uknown type of vehicle
    }

    function rules()
    {
        return Vehicle::$rules;
    }

    function find($id)
    {
        return Vehicle::find($id);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getAll()
    {
        $vehicle = Vehicle::paginate();
        return $vehicle;
    }
}
