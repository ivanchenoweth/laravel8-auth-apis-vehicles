<?php

namespace App\Http\Controllers;

// use App\Models\Vehicle;
use Illuminate\Http\Request;

use App\Services\VehicleService;

/**
 * Class vehicleController
 * @package App\Http\Controllers
 */
class VehicleController extends Controller
{

    private $vehicleService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->vehicleService = new vehicleService();
    }        

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehicles = $this->vehicleService->getAll();

        return view('vehicle.index', compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * $vehicles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle =  $this->vehicleService->createvehicle();
        return view('vehicle.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate($this->vehicleService->rules());
        $vehicle =  $this->vehicleService->create($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = $this->vehicleService->find($id);

        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$vehicle =  $this->vehicleService->find($id);

        //return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        // request()->validate( $this->vehicleService->$rules);

        // $vehicle->update($request->all());

        // return redirect()->route('vehicles.index')
        //     ->with('success', 'vehicle updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $vehicle =  $this->vehicleService->find($id)->delete();

        // return redirect()->route('vehicles.index')
        //     ->with('success', 'vehicle deleted successfully');
    }
}
