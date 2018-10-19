<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::orderBy('id', 'ASC')->paginate(10);
        return view('admin.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeStoreRequest $request)
    {
        $type=Type::create($request->all());
        if (auth()->user()->can(['types.edit'])) {
            return redirect()->route('types.edit', compact('type'))
            ->with('info','tipo de producto añadido correctamente');
        }
        return back()->with('info','El Tipo de producto fue añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeUpdateRequest $request, Type $type)
    {
        $t=Type::find($type->id);
        $t->fill($request->all())->save();
        return redirect()->route('types.edit', compact('type'))
            ->with('info', 'Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $t=Type::find($type->id)->delete();
        return back()->with('info','Tipo de producto eliminado correctamente');
    }
}
