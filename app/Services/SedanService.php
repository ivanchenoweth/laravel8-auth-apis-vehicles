<?php
namespace App\Services;

use App\Services\VehicleService;
use App\Models\Vehicle;

/**
 * Class VehicleService
 * @package App\Services
 */
class SedanService extends VehicleService{

    private $tires;
    private $powermotor;

    function __construct () {
        $this->tires="4";
        $this->powermotor="120HP";
    }

    function create($request){
        $request["tires"]= $this->tires;
        $request["powermotor"]=$this->powermotor;
        return Vehicle::create($request);
    }

}