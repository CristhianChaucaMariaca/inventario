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
    public function index(Request $request)
    {
        $date=$request->get('date');
        $pro=$request->get('product');

        $sales=Sale::orderBy('id', 'DESC')
        ->product($pro)
        ->date($date)
        ->paginate(20);

        $products=Product::orderBy('name','DESC')->pluck('name','id');

        return view('admin.sale.index', compact('sales','products'));
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
        if (Kardex::find($id)) {
            $k=Kardex::find($id);
            if ($request->cuantity > $k->balance) {
                return back()->with('danger','La cantidad solicitada no puede ser mayor al stock en almacenes');
            }elseif (($k->balance-$request->cuantity)<$k->product->min ) {
                return back()->with('danger','La cantidad solicitada no puede dejar un stock menor al minimo');
            }
            elseif ($request->cuantity < 1 ) {
                return back()->with('danger','La cantidad solicitada debe ser mayor a 0');
            }
            $sale=Sale::create($request->all());
            if ($sale->status == 'FINISHED') {
                if ($sale->codex) {
                    return redirect()->route('registroVenta', $sale);
                }
                else{
                    return back()->with('danger','para finalizar una exportación debe contar con un codigo de exportación');
                }
            }
            if (auth()->user()->can('sales.edit')) {
                return redirect()->route('sales.edit', compact('sale'))
                ->with('info','Exportación de producto añadido correctamente');
            }
            return back()->with('info','Exportado correctamente');    
        }else{
            return back()->with('info','El producto no cuenta con stock, debe realizar un compra');
        }
        
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
        $id=Kardex::where('product_id',$request->product_id)->max('id');
        if (Kardex::find($id)) {
            $k=Kardex::find($id);
            if ($request->cuantity > $k->balance) {
                return back()->with('danger','La cantidad solicitada no puede ser mayor al stock en almacenes');
            }elseif (($k->balance-$request->cuantity)<$k->product->min ) {
                return back()->with('danger','La cantidad solicitada no puede dejar un stock menor al minimo');
            }
            elseif ($request->cuantity < 1 ) {
                return back()->with('danger','La cantidad solicitada debe ser mayor a 0');
            }
            $s=Sale::find($sale->id);
            if ($request->get('codex')) {
                if ($request->status == 'FINISHED') {
                    if ($request->codex) {
                        $s->fill($request->all())->save();
                        return redirect()->route('registroVenta', $sale);
                    }
                    else{
                        return back()->with('danger','para finalizar una exportación debe contar con un codigo de exportación');
                    }
                }
                else{
                    return back()->with('danger','para finalizar una exportación debe colocar el estado en finalizado');
                }
            }
            else{
                if ($request->status == 'FINISHED') {
                    return back()->with('danger','para finalizar una exportación debe contar con un codigo de exportación');
                }elseif($request->status == 'PENDING')
                {
                    $s->fill($request->all())->save();
                }
            }
            return redirect()->route('sales.edit', compact('sale'))
                    ->with('info', 'Modificado correctamente MALO MUY MALO');
        }else{
            return back()->with('info','El producto no cuenta con stock, debe realizar un compra');
        }
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
