<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Sale;
use App\Kardex;
use App\Charts\Buys;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class GraphicController extends Controller
{

    public function index(){
        return view('admin.graphics.index');
    }
    
	public function stoksgraphics(){
    	$kardex=Kardex::orderBy('id','ASC')->pluck('balance');
    	$value=Kardex::orderBy('id','ASC')->pluck('value');
    	$date=DB::table('kardexes')->select('created_at')
            ->orderBy('id','ASC')
            ->get();
        $dat=array();
        foreach ($date as $d) {
            $dat[]= $d->created_at;
        }
    	$chart= new Buys;
    	$chart->loaderColor('red');
    	$chart->title('Grafica de Stock en el registro');
        $chart->labels($dat);
        $chart->dataset('Stock','column',$kardex);
    	$chart->dataset('Precio total','column',$value)->options(['color'=>'red']);
    	return view('admin.graphics.buys',compact('chart'));
    }
    public function buysgraphics(){
    	$buys=Buy::orderBy('id','ASC')->pluck('cuantity');
    	$dates=DB::table('buys')->select('created_at')
            ->orderBy('id','ASC')
            ->get();
        $dat= array();
        foreach ($dates as $d) {
            $dat[]=$d->created_at;
        }
        $values=DB::table('buys')->select('unitary','cuantity')
            ->orderBy('id','ASC')
            ->get();
        $val=array();
        foreach ($values as $v) {
            $val[]=$v->unitary*$v->cuantity;
        }
    	$chart= new Buys;
    	$chart->loaderColor('red');
        $chart->labels($dat);
    	$chart->title('Grafica de compras totales');
        $chart->dataset('Cantidad','column',$buys);
    	$chart->dataset('Valor','column',$val)->options(['color'=>'blue']);
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
        $date=DB::table('sales')->select('created_at')
            ->orderBy('id','ASC')
            ->get();
        $dat=array();
        foreach ($date as $d) {
            $dat[]= $d->created_at;
        }
    	$chart= new Buys;
    	$chart->loaderColor('red');
    	$chart->title('Grafica de exportaciones totales');
        $chart->labels($dat);
    	$chart->dataset('Cantidad','column',$salesc);
        $chart->dataset('Precio','column',$val)->options(['color'=>'blue']);
        $chart->dataset('Ganancia','column',$sal)->options(['color'=>'red']);
    	return view('admin.graphics.sales',compact('chart'));
    }
}
