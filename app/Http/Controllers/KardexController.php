<?php

namespace App\Http\Controllers;

use App\Kardex;
use Illuminate\Http\Request;
use App\Buy;
use App\Sale;
use App\Out;
use App\In;
use App\Product;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Barryvdh\DomPDF\Facade as PDF;

class KardexController extends Controller
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

        $kardexs=Kardex::orderBy('created_at', 'DESC')
            ->product($pro)
            ->date($date)
            ->paginate(20);

        $products=Product::orderBy('name','DESC')->pluck('name','id');
        return view('admin.kardex.index', compact('kardexs','products'));
    }

    public function product($product_id){
        $kardexs=Kardex::orderBy('id', 'DESC')
            ->where('product_id', $product_id)
            ->paginate(20);
        return view('admin.kardex.index', compact('kardexs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kardex.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kardex=Kardex::create($request->all());
        return redirect()->route('kardexes.edit', compact('kardex'))
            ->with('info','Registrado en kardex correctamente');
    }
    public function registro_compra(Buy $buy)
    {
        //$id=DB::table('kardexes')->count()->where('product_id',$buy->product_id);
        
        if (Kardex::where('product_id',$buy->product_id)->max('id')) {
            //Si el kardex esta iniciado
            $id=Kardex::where('product_id',$buy->product_id)->max('id');
            $k=Kardex::find($id);  
            $kardex = new Kardex;
            $kardex->user_id=$buy->user_id;
            $kardex->buy_id= $buy->id;
            $kardex->product_id=$buy->product_id;
            $kardex->balance=$k->balance+$buy->cuantity;
            $kardex->value=$k->value+($buy->unitary*$buy->cuantity);
            $kardex->type='INPUT';

            $kardex->save();

            $in= new In;
            $in->kardex_id=$kardex->id;
            $in->cuantity = $buy->cuantity;
            $in->value     = $buy->unitary;
            $in->save();  
        }else{
            //Si el kardex no esta iniciado
            $kardex = new Kardex;
            $kardex->user_id=$buy->user_id;
            $kardex->buy_id= $buy->id;
            $kardex->product_id=$buy->product_id;
            $kardex->balance=$buy->cuantity;
            $kardex->value=$buy->unitary*$buy->cuantity;
            $kardex->type='INPUT';

            $kardex->save();

            $in= new In;
            $in->kardex_id=$kardex->id;
            $in->cuantity = $buy->cuantity;
            $in->value     = $buy->unitary;
            $in->save();  
        }

        


        if (auth()->user()->can('buys.edit')) {
            return redirect()->route('buys.edit', $buy)
                ->with('info', 'La compra se registro correctamente');
        }
        return redirect()->route('buys.create')
            ->with('info','Campra realizada correctamente');
    }
    public function registroVenta(Sale $sale)
    {
        //$id=DB::table('kardexes')->count();
        $id=Kardex::where('product_id',$sale->product_id)->max('id');
        $k=Kardex::find($id);

        $kardex = new Kardex;
        $kardex->user_id=$sale->user_id;
        $kardex->sale_id= $sale->id;
        $kardex->product_id=$sale->product_id;
        $kardex->balance=$k->balance-$sale->cuantity;
        $kardex->value=$k->value-(($k->value/$k->balance)*$sale->cuantity);
        $kardex->type='OUTPUT';

        $kardex->save();

        $out= new Out;
        $out->kardex_id=$kardex->id;
        $out->cuantity = $sale->cuantity;
        $out->value     = $sale->unitary;
        $out->save();


        if (auth()->user()->can('sales.edit')) {
            return redirect()->route('sales.edit', $sale)
                ->with('info', 'La venta se registro correctamente');
        }
        return redirect()->route('sales.create')
            ->with('info','Exportacion realizada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kardex  $kardex
     * @return \Illuminate\Http\Response
     */
    public function show(Kardex $kardex)
    {
        return view('admin.kardex.show', compact('kardex'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kardex  $kardex
     * @return \Illuminate\Http\Response
     */
    public function edit(Kardex $kardex)
    {
        $products=Product::orderBy('name','DESC')->pluck('name','id');
        $providers=Provider::orderBy('name','DESC')->pluck('name','id');
        return view('admin.kardex.edit', compact('kardex','products','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kardex  $kardex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kardex $kardex)
    {
        $t=Kardex::find($kardex->id);
        $t->fill($request->all())->save();
        return redirect()->route('kardexs.edit', compact('kardex'))
            ->with('info', 'Modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kardex  $kardex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kardex $kardex)
    {
        $t=Kardex::find($kardex->id)->delete();
        return back()->with('danger','Kardex de producto eliminado correctamente');
    }
}
