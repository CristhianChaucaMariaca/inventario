@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienbenido {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('types.index') }}">Tipos de productos</a><br>
                    <a href="{{ route('products.index') }}">Productos</a><br>
                    <a href="{{ route('providers.index') }}">Proveedores</a><br>
                    <a href="{{ route('buys.index') }}">Compras</a><br>
                    <a href="{{ route('drivers.index') }}">Conductores</a><br>
                    <a href="{{ route('sales.index') }}">Ventas</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
