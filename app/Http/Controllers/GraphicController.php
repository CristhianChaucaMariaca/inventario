<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Sale;
use App\Kardex;
use App\Charts\Buys;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GraphicController extends Controller
{
    
	public function stoksgraphics(){
    	$kardex=Kardex::orderBy('id','ASC')->pluck('balance');
    	$value=Kardex::orderBy('id','ASC')->pluck('value');
    	//$buysc=Kardex::orderBy('id','ASC')->pluck('created_at');
    	$chart= new Buys;
    	$chart->loaderColor('red');
    	$chart->title('Grafica de Stock en el registro');
    	$chart->dataset('Promedio Ponderado','line',$value)->options(['color'=>'red']);
    	$chart->dataset('Stock','line',$kardex);
    	return view('admin.graphics.buys',compact('chart'));
    }
    public function buysgraphics(){
    	$buys=Buy::orderBy('id','ASC')->pluck('cuantity');
    	//$buysc=Buy::orderBy('id','ASC')->pluck('created_at');
    	$chart= new Buys;
    	$chart->loaderColor('red');
    	$chart->title('Grafica de compras totales');
    	$chart->dataset('Compra','line',$buys);
    	return view('admin.graphics.buys',compact('chart'));
    }
    public function salesgraphics(){
    	$salesc=Sale::orderBy('id','ASC')->pluck('cuantity');
    	$sales=DB::table('sales')
            ->join('kardexes', 'kardexes.sale_id','=','sales.id')
            ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
            ->get();
        $sal = array();
        foreach ($sales as $sale) {
            $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
        }
        $valor=DB::table('sales')->select('cuantity','unitary')
            ->orderBy('id','ASC')
            ->get();
        $val=array();
        foreach ($valor as $v) {
            $val[]= $v->cuantity*$v->unitary;
        }
    	$chart= new Buys;
    	$chart->loaderColor('red');
    	$chart->title('Grafica de exportaciones totales');
    	$chart->dataset('Exportacion','line',$salesc);
        $chart->dataset('Ganancia','line',$sal)->options(['color'=>'blue']);
    	$chart->dataset('Precio','line',$val)->options(['color'=>'red']);
    	return view('admin.graphics.sales',compact('chart'));
    }
}
