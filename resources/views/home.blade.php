@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4>Bienbenido <strong>{{ Auth::user()->name }}</strong></h4></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        @can('users.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-user-tie text-center text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('users.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Usuarios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('roles.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-key2 text-center text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('roles.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Roles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('types.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-price-tag text-center text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('types.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Tipos de productos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('measures.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-price-tag text-center text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('measures.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Medidas de productos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('products.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-leaf text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('products.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Productos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('providers.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-briefcase text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('providers.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Proveedores</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('buys.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-cart text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('buys.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Compras</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('drivers.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-truck text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('drivers.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Conductores</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('sales.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-airplane text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('sales.index') }}" class="btn btn-dark btn-block" style="margin: 1px">Exportaciones</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('kardexes.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-file-text text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('kardexes.index') }}" class="btn btn-dark btn-block" style="margin: 1px">kardex</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('reports.index')
                        <div class="col-md-4">
                            <div class="card border-secondary mb-3">
                                <div class="card-header"><h1 class="icon-file-pdf text-center"></h1></div>
                                <div class="card-body text-primary">
                                    <div class="card-text">
                                        <a href="{{ route('reports') }}" class="btn btn-dark btn-block" style="margin: 1px">Reportes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
