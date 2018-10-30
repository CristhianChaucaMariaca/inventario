<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

use App\Http\Requests\SaleStoreRequest;
use App\Http\Requests\SaleUpdateRequest;

use App\Product;
use App\Driver;
use App\Vehicle;
use App\Kardex;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Barryvdh\DomPDF\Facade as PDF;

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
        $products=Product::orderBy('name','DESC')->where('status','PUBLIC')->pluck('name','id');
        $drivers=Driver::orderBy('name','DESC')->where('user_id',auth()->user()->id)->pluck('name','id');
        $vehicles=Vehicle::orderBy('plaque','DESC')->where('status','FREE')->pluck('plaque','id');
        return view('admin.sale.create', compact('products','drivers','vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleStoreRequest $request)
    {
        $id=Kardex::where('product_id',$request->product_id)->max('id');
        $k=Kardex::find($id);
        if ($request->cuantity > $k->balance) {
            return back()->with('danger','La cantidad solicitada no puede ser mayor al stock en almacenes');
        }elseif (($k->balance-$request->cuantity)<$k->product->min ) {
            return back()->with('danger','La cantidad solicitada no puede dejar un stock menor al minimo');
        }
        $sale=Sale::create($request->all());
        if ($sale->status == 'FINISHED') {
            return redirect()->route('registroVenta', $sale);
        }
        if (auth()->user()->can('sales.edit')) {
            return redirect()->route('sales.edit', compact('sale'))
            ->with('info','Compra de producto añadido correctamente');
        }
        return back()->with('info','Exportado correctamente');
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
        $vehicles=Vehicle::orderBy('plaque','DESC')->where('status','FREE')->pluck('plaque','id');
        return view('admin.sale.edit', compact('sale','products','drivers','vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(SaleUpdateRequest $request, Sale $sale)
    {
        $s=Sale::find($sale->id);
        $s->fill($request->all())->save();
        if ($s->status == 'FINISHED') {
            return redirect()->route('registroVenta', $sale);
        }
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
        return back()->with('danger','Sale de producto eliminado correctamente');
    }
}
