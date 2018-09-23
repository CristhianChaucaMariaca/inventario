<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

use App\Product;
use App\Driver;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sale::orderBy('id', 'DESC')->paginate(20);
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::orderBy('name','DESC')->pluck('name','id');
        $drivers=Driver::orderBy('name','DESC')->where('status','FREE')->pluck('name','id');
        return view('admin.sale.create', compact('products','drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale=Sale::create($request->all());
        return redirect()->route('sales.edit', compact('sale'))
            ->with('info','Compra de producto añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('admin.sale.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $products=Product::orderBy('name','DESC')->pluck('name','id');
        $drivers=Driver::orderBy('name','DESC')->pluck('name','id');
        return view('admin.sale.edit', compact('sale','products','drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $t=Sale::find($sale->id);
        $t->fill($request->all())->save();
        return redirect()->route('sales.edit', compact('sale'))
            ->with('info', 'Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $t=Sale::find($sale->id)->delete();
        return back()->with('info','Sale de producto eliminado correctamente');
    }
}
