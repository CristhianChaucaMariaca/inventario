<?php

namespace App\Http\Controllers;

use App\Buy;
use Illuminate\Http\Request;

use App\Http\Requests\BuyStoreRequest;
use App\Http\Requests\BuyUpdateRequest;

use App\Provider;
use App\Product;
use App\Kardex;

use Barryvdh\DomPDF\Facade as PDF;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buys=Buy::orderBy('id', 'DESC')->paginate(20);
        return view('admin.buy.index', compact('buys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::orderBy('name','DESC')->where('status','PUBLIC')->pluck('name','id');

        $providers=Provider::orderBy('name','DESC')->pluck('name','id');
        return view('admin.buy.create', compact('products','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuyStoreRequest $request)
    {
        $buy=Buy::create($request->all());
        if ($buy->status == 'FINISHED') 
        {
            return redirect()->route('registroCompra', $buy);
        }
        if (auth()->user()->can('buys.edit')) {
            return redirect()->route('buys.edit', compact('buy'))
            ->with('info','Compra de producto añadido correctamente');
        }
        return back()->with('info','Compra  realizada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function show(Buy $buy)
    {
        return view('admin.buy.show', compact('buy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function edit(Buy $buy)
    {
        $products=Product::orderBy('name','DESC')->pluck('name','id');
        $providers=Provider::orderBy('name','DESC')->pluck('name','id');
        return view('admin.buy.edit', compact('buy','products','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function update(BuyUpdateRequest $request, Buy $buy)
    {
        $t=Buy::find($buy->id);
        $t->fill($request->all())->save();
        if ($t->status == 'FINISHED') 
        {
            return redirect()->route('registro', $buy);
        }
        return redirect()->route('buys.edit', compact('buy'))
            ->with('info', 'Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        $t=Buy::find($buy->id)->delete();
        return back()->with('info','Buy de producto eliminado correctamente');
    }


}
