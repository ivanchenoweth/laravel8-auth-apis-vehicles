<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VehicleService;

class ApiVehicleController extends Controller
{
    /** 
     * @var App\Services\VehicleService $vehicleApiService
     * */
    private $vehicleApiService;

    // TODO - include in .env 
    private $APIinfo = "API Vehicle V1.1 2022 - IRCH";

    // TODO - DI for testing
    function __construct()
    {
        $this->vehicleService = new vehicleService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicles = $this->vehicleService->getAll();
        return response()->json(
            [
                'success' => true,
                'message' =>  $this->APIinfo . " - method: index-getAll",
                'payload' => $vehicles
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //request()->validate($this->vehicleService->rules());
        //dd($request->all());
        $ret =  $this->vehicleService->create($request->all());
        if ($ret == false) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Error Requested'
                ]
            );
        }
        return response()->json(
            [
                'success' => true,
                'message' => $ret
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ret =  $this->vehicleService->find($id);
        
        return response()->json(
            [
                'success' => true,
                'message' =>  $this->APIinfo . " - method: show Vehicle",
                'payload' => $ret
            ],
            200
        );
    }
}
