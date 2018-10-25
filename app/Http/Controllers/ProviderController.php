<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

use App\Http\Requests\ProviderStoreRequest;
use App\Http\Requests\ProviderUpdateRequest;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name=$request->get('name');
        $providers=Provider::orderBy('id','DESC')
            ->name($name)
            ->paginate(10);
        return view('admin.provider.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderStoreRequest $request)
    {
        $provider =Provider::create($request->all());
        if (auth()->user()->can(['providers.edit'])) {
            return redirect()->route('providers.edit', compact('provider'))
            ->with('info','Proveedor añadido correctamente');
        }
        return back()->with('info','Proveedor añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit',compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderUpdateRequest $request, Provider $provider)
    {
        $pro=Provider::find($provider->id);
        $pro->fill($request->all())->save();
        return redirect()->route('providers.edit', compact('pro'))
            ->with('info','Proveedor editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $pro=Provider::find($provider->id)->delete();
        return back()->with('danger','Proveedor Eliminado correctamente');
    }
}
