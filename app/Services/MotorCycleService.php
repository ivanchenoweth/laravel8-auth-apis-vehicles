<?php
namespace App\Services;

use App\Services\VehicleService;
use App\Models\Vehicle;

/**
 * Class VehicleService
 * @package App\Services
 */
class MotorCycleService extends VehicleService {

    private $tires;
    private $powermotor;

    function __construct () {
        $this->tires="2";
        $this->powermotor="50HP";
    }

    function create($request){
        $request["tires"]= $this->tires;
        $request["powermotor"]=$this->powermotor;
        return Vehicle::create($request);
    }




}