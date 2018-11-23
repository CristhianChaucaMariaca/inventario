<?php

namespace App\Http\Controllers;

use App\Buy;
use App\Sale;
use App\Kardex;
use App\Charts\Buys;
use App\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class GraphicController extends Controller
{

    public function index(){

        $products=Product::orderBy('name','DESC')->pluck('name','id');

        return view('admin.graphics.index',compact('products'));
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

    public function stock_today(){
        $today=Carbon::create()->format('Y-m-d');

        $kardex=Kardex::orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
            ->pluck('balance');

        $value=Kardex::orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
            ->pluck('value');

        $date=DB::table('kardexes')->select('created_at')
            ->orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
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

    public function stock_month(){
        $y=Carbon::create()->format('Y');
        $m=Carbon::create()->format('m');

        $kardex=Kardex::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->pluck('balance');

        $value=Kardex::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->pluck('value');

        $date=DB::table('kardexes')->select('created_at')
            ->orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
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

    public function stock_year(){
        $y=Carbon::create()->format('Y');

        $kardex=Kardex::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->pluck('balance');

        $value=Kardex::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->pluck('value');

        $date=DB::table('kardexes')->select('created_at')
            ->orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
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

    public function buy_config(Request $request){
        
        $date=$request->get('date');
        $product=$request->get('product');

        $buys=Buy::orderBy('id','ASC')
            ->date($date)
            ->product($product)
            ->pluck('buys.cuantity');

        $dat= array();
        $val=array();

        if ($date == 'today') {
            $d=Carbon::create()->format('Y-m-d');


            $dates=DB::table('buys')->select('buys.created_at')
                ->orderBy('id','ASC')
                ->whereDate('created_at','=',$d)
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($dates as $d) {
                $dat[]=$d->created_at;
            }
            $values=DB::table('buys')->select('unitary','cuantity')
                ->orderBy('id','ASC')
                ->whereDate('created_at','=',$d)
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($values as $v) {
                $val[]=$v->unitary*$v->cuantity;
            }


            
        }elseif ($date=='month') {
            $y=Carbon::create()->format('Y');
            $m=Carbon::create()->format('m');
            


            $dates=DB::table('buys')->select('buys.created_at')
                ->orderBy('id','ASC')
                ->whereYear('created_at','=',$y)
                ->whereMonth('created_at','=',$m)
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($dates as $d) {
                $dat[]=$d->created_at;
            }
            $values=DB::table('buys')->select('unitary','cuantity')
                ->orderBy('id','ASC')
                ->whereYear('created_at','=',$y)
                ->whereMonth('created_at','=',$m)
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($values as $v) {
                $val[]=$v->unitary*$v->cuantity;
            }


        }
        elseif ($date=='year') {
            $y=Carbon::create()->format('Y');
            

            $dates=DB::table('buys')->select('buys.created_at')
                ->orderBy('id','ASC')
                ->whereYear('created_at','=',$y)
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($dates as $d) {
                $dat[]=$d->created_at;
            }
            $values=DB::table('buys')->select('unitary','cuantity')
                ->orderBy('id','ASC')
                ->whereYear('created_at','=',$y)
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($values as $v) {
                $val[]=$v->unitary*$v->cuantity;
            }



        }elseif ($date=='') {
            $dates=DB::table('buys')->select('buys.created_at')
                ->orderBy('id','ASC')
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($dates as $d) {
                $dat[]=$d->created_at;
            }
            $values=DB::table('buys')->select('unitary','cuantity')
                ->orderBy('id','ASC')
                ->where('product_id','=',$product)
                ->get();
            
            foreach ($values as $v) {
                $val[]=$v->unitary*$v->cuantity;
            }
        }
        
        $chart= new Buys;
        $chart->loaderColor('red');
        $chart->labels($dat);
        $chart->title('Grafica de compras totales');
        $chart->dataset('Cantidad','column',$buys);
        $chart->dataset('Valor','column',$val)->options(['color'=>'blue']);
        return view('admin.graphics.buys',compact('chart'));
    }

    public function buy_today(){
        $today=Carbon::create()->format('Y-m-d');

        $buys=Buy::orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
            ->pluck('cuantity');

        $dates=DB::table('buys')->select('created_at')
            ->whereDate('created_at','=',$today)
            ->orderBy('id','ASC')
            ->get();
        $dat= array();
        foreach ($dates as $d) {
            $dat[]=$d->created_at;
        }
        $values=DB::table('buys')->select('unitary','cuantity')
            ->whereDate('created_at','=',$today)
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

    public function buy_month(){
        $y=Carbon::create()->format('Y');
        $m=Carbon::create()->format('m');

        $buys=Buy::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->pluck('cuantity');

        $dates=DB::table('buys')->select('created_at')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->orderBy('id','ASC')
            ->get();
        $dat= array();
        foreach ($dates as $d) {
            $dat[]=$d->created_at;
        }
        $values=DB::table('buys')->select('unitary','cuantity')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
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

    public function buy_year(){
        $y=Carbon::create()->format('Y');

        $buys=Buy::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->pluck('cuantity');

        $dates=DB::table('buys')->select('created_at')
            ->whereYear('created_at','=',$y)
            ->orderBy('id','ASC')
            ->get();
        $dat= array();
        foreach ($dates as $d) {
            $dat[]=$d->created_at;
        }
        $values=DB::table('buys')->select('unitary','cuantity')
            ->whereYear('created_at','=',$y)
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

    public function sales_config(Request $request){

        $date=$request->get('date');
        $pro=$request->get('product');

        $sal = array();
        $val=array();
        $dat=array();


        if ($date == 'today') {
            $d=Carbon::create()->format('Y-m-d');
            
            $salesc=Sale::orderBy('id','ASC')
            ->whereDate('created_at','=',$date)
            ->where('product_id','=',$pro)
            ->pluck('cuantity');

            $sales=DB::table('sales')
                ->whereDate('sales.created_at','=',$d)
                ->where('sales.product_id','=',$pro)
                ->join('kardexes', 'kardexes.sale_id','=','sales.id')
                ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
                ->get();
            
            foreach ($sales as $sale) {
                $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
            }
            $valor=DB::table('sales')->select('cuantity','unitary')
                ->orderBy('id','ASC')
                ->whereDate('sales.created_at','=',$d)
                ->where('product_id','=',$pro)
                ->get();
            
            foreach ($valor as $v) {
                $val[]= $v->cuantity*$v->unitary;
            }
            $date=DB::table('sales')->select('created_at')
                ->orderBy('id','ASC')
                ->whereDate('sales.created_at','=',$d)
                ->where('product_id','=',$pro)
                ->get();
            
            foreach ($date as $d) {
                $dat[]= $d->created_at;
            }


        }elseif ($date=='month') {
            $y=Carbon::create()->format('Y');
            $m=Carbon::create()->format('m');
            
            $salesc=Sale::orderBy('id','ASC')
            ->where('product_id','=',$pro)
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->pluck('cuantity');

            $sales=DB::table('sales')
                ->where('sales.product_id','=',$pro)
                ->whereYear('sales.created_at','=',$y)
                ->whereMonth('sales.created_at','=',$m)
                ->join('kardexes', 'kardexes.sale_id','=','sales.id')
                ->select('sales.product_id','sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
                ->get();
            
            foreach ($sales as $sale) {
                $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
            }
            $valor=DB::table('sales')
                ->where('product_id','=',$pro)
                ->select('cuantity','unitary')
                ->orderBy('id','ASC')
                ->whereYear('sales.created_at','=',$y)
                ->whereMonth('sales.created_at','=',$m)
                ->get();
            
            foreach ($valor as $v) {
                $val[]= $v->cuantity*$v->unitary;
            }
            $date=DB::table('sales')->select('created_at')
                ->where('product_id','=',$pro)
                ->orderBy('id','ASC')
                ->whereYear('sales.created_at','=',$y)
                ->whereMonth('sales.created_at','=',$m)
                ->get();
            
            foreach ($date as $d) {
                $dat[]= $d->created_at;
            }



        }
        elseif ($date=='year') {
            $y=Carbon::create()->format('Y');
            
            $salesc=Sale::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->pluck('cuantity');

            $sales=DB::table('sales')
                ->where('product_id','=',$pro)
                ->whereYear('sales.created_at','=',$y)
                ->where('sales.product_id','=',$pro)
                ->join('kardexes', 'kardexes.sale_id','=','sales.id')
                ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
                ->get();
            
            foreach ($sales as $sale) {
                $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
            }
            $valor=DB::table('sales')->select('cuantity','unitary')
                ->where('product_id','=',$pro)
                ->orderBy('id','ASC')
                ->whereYear('sales.created_at','=',$y)
                ->where('product_id','=',$pro)
                ->get();
            
            foreach ($valor as $v) {
                $val[]= $v->cuantity*$v->unitary;
            }
            $date=DB::table('sales')->select('created_at')
                ->where('product_id','=',$pro)
                ->orderBy('id','ASC')
                ->whereYear('created_at','=',$y)
                ->where('product_id','=',$pro)
                ->get();
            
            foreach ($date as $d) {
                $dat[]= $d->created_at;
            }




        }elseif ($date=='') {

            $salesc=Sale::orderBy('id','ASC')
            ->where('product_id','=',$pro)
            ->pluck('cuantity');
            $sales=DB::table('sales')
                ->where('sales.product_id','=',$pro)
                ->join('kardexes', 'kardexes.sale_id','=','sales.id')
                ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
                ->get();
            $sal = array();
            foreach ($sales as $sale) {
                $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
            }
            $valor=DB::table('sales')->select('cuantity','unitary')
                ->where('sales.product_id','=',$pro)
                ->orderBy('id','ASC')
                ->get();
            $val=array();
            foreach ($valor as $v) {
                $val[]= $v->cuantity*$v->unitary;
            }
            $date=DB::table('sales')->select('created_at')
                ->orderBy('id','ASC')
                ->where('product_id','=',$pro)
                ->get();
            $dat=array();
            foreach ($date as $d) {
                $dat[]= $d->created_at;
            }

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

    public function sales_today(){
        $today=Carbon::create()->format('Y-m-d');

        $salesc=Sale::orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
            ->pluck('cuantity');
        $sales=DB::table('sales')
            ->whereDate('sales.created_at','=',$today)
            ->join('kardexes', 'kardexes.sale_id','=','sales.id')
            ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
            ->get();
        $sal = array();
        foreach ($sales as $sale) {
            $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
        }
        $valor=DB::table('sales')->select('cuantity','unitary')
            ->orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
            ->get();
        $val=array();
        foreach ($valor as $v) {
            $val[]= $v->cuantity*$v->unitary;
        }
        $date=DB::table('sales')->select('created_at')
            ->orderBy('id','ASC')
            ->whereDate('created_at','=',$today)
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

    public function sales_month(){
        $y=Carbon::create()->format('Y');
        $m=Carbon::create()->format('m');

        $salesc=Sale::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->pluck('cuantity');
        $sales=DB::table('sales')
            ->whereYear('sales.created_at','=',$y)
            ->whereMonth('sales.created_at','=',$m)
            ->join('kardexes', 'kardexes.sale_id','=','sales.id')
            ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
            ->get();
        $sal = array();
        foreach ($sales as $sale) {
            $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
        }
        $valor=DB::table('sales')->select('cuantity','unitary')
            ->orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
            ->get();
        $val=array();
        foreach ($valor as $v) {
            $val[]= $v->cuantity*$v->unitary;
        }
        $date=DB::table('sales')->select('created_at')
            ->orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->whereMonth('created_at','=',$m)
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

    public function sales_year(){
        $y=Carbon::create()->format('Y');

        $salesc=Sale::orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->pluck('cuantity');
        $sales=DB::table('sales')
            ->whereYear('sales.created_at','=',$y)
            ->join('kardexes', 'kardexes.sale_id','=','sales.id')
            ->select('sales.unitary','sales.cuantity','kardexes.value','kardexes.balance')
            ->get();
        $sal = array();
        foreach ($sales as $sale) {
            $sal[]= (($sale->unitary * $sale->cuantity) - (($sale->value / $sale->balance) * $sale->cuantity));
        }
        $valor=DB::table('sales')->select('cuantity','unitary')
            ->orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
            ->get();
        $val=array();
        foreach ($valor as $v) {
            $val[]= $v->cuantity*$v->unitary;
        }
        $date=DB::table('sales')->select('created_at')
            ->orderBy('id','ASC')
            ->whereYear('created_at','=',$y)
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
