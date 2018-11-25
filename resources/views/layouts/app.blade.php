<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('Font/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('extends')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
          <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}"><sapan class="icon-home"></sapan> <span class="sr-only">(current)</span></a>
              </li>
                        @can('measures.index')
                        <li class="nav-item {{ request()->is('measures') ? 'active' : '' }}"><a href="{{ route('measures.index') }}" class="nav-link">Medidas</a></li>
                        @endcan
                        @can('types.index')
                        <li class="nav-item {{ request()->is('types') ? 'active' : '' }}"><a href="{{ route('types.index') }}" class="nav-link">Tipos</a></li>
                        @endcan
                        @can('products.index')
                        <li class="nav-item {{ request()->is('products') ? 'active' : '' }}"><a href="{{ route('products.index') }}" class="nav-link">Productos</a></li>
                        @endcan
                        @can('users.index')
                        <li class="nav-item {{ request()->is('users') ? 'active' : '' }}"><a href="{{ route('users.index') }}" class="nav-link">Usuarios</a></li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item {{ request()->is('roles') ? 'active' : '' }}"><a href="{{ route('roles.index') }}" class="nav-link">Roles</a></li>
                        @endcan
                        @can('vehicles.index')
                        <li class="nav-item {{ request()->is('vehicles') ? 'active' : '' }}"><a href="{{ route('vehicles.index') }}" class="nav-link">vehiculos</a></li>
                        @endcan
                        @can('drivers.index')
                        <li class="nav-item {{ request()->is('drivers') ? 'active' : '' }}"><a href="{{ route('drivers.index') }}" class="nav-link">Conductores</a></li>
                        @endcan
                        @can('providers.index')
                        <li class="nav-item {{ request()->is('providers') ? 'active' : '' }}"><a href="{{ route('providers.index') }}" class="nav-link">Proveedores</a></li>
                        @endcan
                        @can('buys.index')
                        <li class="nav-item {{ request()->is('buys') ? 'active' : '' }}"><a href="{{ route('buys.index') }}" class="nav-link">Compras</a></li>
                        @endcan
                        @can('sales.index')
                        <li class="nav-item {{ request()->is('sales') ? 'active' : '' }}"><a href="{{ route('sales.index') }}" class="nav-link">Exportaciones</a></li>
                        @endcan
                        @can('kardexes.index')
                        <li class="nav-item {{ request()->is('kardexes') ? 'active' : '' }}"><a href="{{ route('kardexes.index') }}" class="nav-link">Kardex</a></li>
                        @endcan
                        @can('kardexes.stock')
                        <li class="nav-item {{ request()->is('stock') ? 'active' : '' }}"><a href="{{ route('kardexes.stock') }}" class="nav-link">Stock</a></li>
                        @endcan
                        @can('reports.index')
                        <li class="nav-item {{ request()->is('reports') ? 'active' : '' }}"><a href="{{ route('reports') }}" class="nav-link"><span class="icon-file-pdf"></span></a></li>
                        @endcan
                        @can('graphics.index')
                        <li class="nav-item {{ request()->is('charts') ? 'active' : '' }}"><a href="{{ route('charts') }}" class="nav-link"><span class="icon-stats-bars"></span></a></li>
                        @endcan
            </ul>
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <span class="icon-user"></span>{{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
          </div>
        </nav>
        @if(session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif()
        @if(session('danger'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger">
                            {{  session('danger') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif()
        @if(count($errors))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
