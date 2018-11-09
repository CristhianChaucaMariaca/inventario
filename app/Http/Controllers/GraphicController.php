<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Sale;
use App\Kardex;
use App\Charts\Buys;

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
    	$sales=Sale::orderBy('id','ASC')->pluck('cuantity');
    	//$salesc=Sale::orderBy('id','ASC')->pluck('created_at');
    	$chart= new Buys;
    	$chart->loaderColor('red');
    	$chart->title('Grafica de exportaciones totales');
    	$chart->dataset('Exportacion','line',$sales);
    	//$chart->dataset('ppp','line',$value);
    	return view('admin.graphics.sales',compact('chart'));
    }
}
