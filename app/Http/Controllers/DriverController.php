<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

use App\Http\Requests\DriverStoreRequest;
use App\Http\Requests\DriverUpdateRequest;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isRole( 'admin' )) { 
            $drivers=Driver::orderBy('id', 'ASC')->paginate(10);
        }else{
            $drivers=Driver::orderBy('id', 'ASC')->where('user_id',auth()->user()->id)->paginate(10);
        }
        return view('admin.driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverStoreRequest $request)
    {
        $driver=Driver::create($request->all());
        if (auth()->user()->can(['drivers.edit'])) {
            return redirect()->route('drivers.edit', compact('driver'))
            ->with('info','tipo de producto añadido correctamente');
        }
        return back()->with('info','Conductor añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('admin.driver.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('admin.driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(DriverUpdateRequest $request, Driver $driver)
    {
        $d=Driver::find($driver->id);
        $d->fill($request->all())->save();
        return redirect()->route('drivers.edit', compact('driver'))
            ->with('info', 'Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $d=Driver::find($driver->id)->delete();
        return back()->with('info','Tipo de producto eliminado correctamente');
    }
}
