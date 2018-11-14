<?php

namespace App\Http\Controllers;

use App\Measure;
use Illuminate\Http\Request;

use App\Http\Requests\MeasureStoreRequest;
use App\Http\Requests\MeasureUpdateRequest;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measures=Measure::orderBy('id', 'ASC')->paginate(10);
        return view('admin.measure.index', compact('measures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.measure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeasureStoreRequest $request)
    {
        $measure=Measure::create($request->all());
        if (auth()->user()->can(['measures.edit'])) {
            return redirect()->route('measures.edit', compact('measure'))
            ->with('info','Medida añadida correctamente');
        }
        return back()->with('info','La medida de producto fue añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        return view('admin.measure.show', compact('measure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function edit(Measure $measure)
    {
        return view('admin.measure.edit', compact('measure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function update(MeasureUpdateRequest $request, Measure $measure)
    {
        $measure->update($request->all());
        return redirect()->route('measures.edit', compact('measure'))
            ->with('info', 'Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        $measure->delete();
        return back()->with('danger','Medida de producto eliminado correctamente');
    }
}
