<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;

use App\Kardex;
use App\Sale;
use App\Buy;
use App\Driver;
use App\Product;
use App\Provider;
use App\User;

use Illuminate\Http\Request;

class ReportController extends Controller
{
	public function index(){
		return view('admin.report.index');
	}
    public function report(){
        $kardexs=Kardex::orderBy('created_at','DESC')->get();
        $pdf=PDF::loadView('admin.report.kardexes',compact('kardexs'));
        return $pdf->download('kardex.pdf');
    }

    public function report_venta(){
        $sales=Sale::orderBy('created_at','DESC')->get();
        $pdf=PDF::loadView('admin.report.exports',compact('sales'));
        return $pdf->download('Historial-de-exportaciones.pdf');
    }

    public function report_compra(){
        $buys=Buy::orderBy('created_at','DESC')->get();
        $pdf=PDF::loadView('admin.report.buys',compact('buys'));
        return $pdf->download('Historial-de-Compras.pdf');
    }

    public function drivers(){
        $drivers=Driver::orderBy('created_at','DESC')->get();
        $pdf=PDF::loadView('admin.report.drivers',compact('drivers'));
        return $pdf->download('Lista_de_conductores.pdf');
    }

    public function products(){
        $products=Product::orderBy('created_at','DESC')->get();
        $pdf=PDF::loadView('admin.report.products',compact('products'));
        return $pdf->download('Lista_de_Productos.pdf');
    }

    public function providers(){
        $providers=Provider::orderBy('created_at','DESC')->get();
        $pdf=PDF::loadView('admin.report.providers',compact('providers'));
        return $pdf->download('Lista_de_Proveedores.pdf');
    }

    public function users(){
        $users=User::orderBy('name','ASC')->get();
        $pdf=PDF::loadView('admin.report.users',compact('users'));
        return $pdf->download('Lista_de_Usuarios.pdf');
    }
}