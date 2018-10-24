<?php

namespace App\Http\Controllers;

use App\Product;
use App\Type;
use App\Kardex;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name=$request->get('name');
        $products=Product::orderBy('id','DESC')
            ->name($name)
            ->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::orderBy('name','ASC')->pluck('name','id');
        return view('admin.product.create', compact('types'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product =Product::create($request->all());
        if (auth()->user()->can(['products.edit'])) {
            return redirect()->route('products.edit', compact('product'))
            ->with('info','Producto añadido correctamente');
        }
        return back()->with('info','Producto añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types=Type::orderBy('name','ASC')->pluck('name','id');
        return view('admin.product.edit',compact('product','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $pro=Product::find($product->id);
        $pro->fill($request->all())->save();
        return redirect()->route('products.edit', compact('pro'))
            ->with('info','Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $pro=Product::find($product->id)->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
