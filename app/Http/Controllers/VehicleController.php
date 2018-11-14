<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles=Vehicle::orderBy('id', 'ASC')->paginate(10);
        return view('admin.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleStoreRequest $request)
    {
        $vehicle=Vehicle::create($request->all());
        if (auth()->user()->can(['vehicles.edit'])) {
            return redirect()->route('vehicles.edit', compact('vehicle'))
            ->with('info','Medida añadida correctamente');
        }
        return back()->with('info','Vehiculo fue añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('admin.vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleUpdateRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return redirect()->route('vehicles.edit', compact('vehicle'))
            ->with('info', 'Vehiculo modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return back()->with('danger','Vehiculo eliminado correctamente');
    }
}
