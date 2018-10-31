@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Codigo de registro:  {{ $kardex->id }}
						@can('reports.kardex')
							<a href="{{ route('detallekardex',$kardex) }}" class="btn btn-default pull-right"><span class="icon-file-pdf"></span></a>
						@endcan
					</h3>
				</div>
				<div class="panel-body">
					@if($kardex->type == 'INPUT')
						<p>
							<strong>Producto: </strong> {{ $kardex->buy->product->name }} 
							@can('products.show')
							<a href="{{ route('products.show', $kardex->buy->product) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
							@endcan
						</p>
						<p><strong>Cantidad adquirida: </strong>{{ $kardex->buy->cuantity }}</p>
						<p><strong>Costo total: </strong> {{ $kardex->in->value }}</p>
						<p><strong>Precio unitario: </strong> {{ $kardex->buy->unitary }}</p>
						<p>
							<strong>Proveedor: </strong> {{ $kardex->buy->provider->name }} 
							@can('providers.show')
							<a href="{{ route('providers.show', $kardex->buy->provider) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
							@endcan
						</p>
					@elseif($kardex->type == 'OUTPUT')
						<p>
							<strong>Producto: </strong> {{ $kardex->sale->product->name }} 
							@can('products.show')
							<a href="{{ route('products.show', $kardex->sale->product) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
							@endcan
						</p>
						<p><strong>Cantidad adquirida: </strong>{{ $kardex->sale->cuantity }}</p>
						<p><strong>Costo total: </strong> {{ $kardex->output->value }} </p>
						<p><strong>Precio unitario: </strong> {{ $kardex->sale->unitary }}</p>
						<p>
							<strong>Nombre de conductor: </strong> {{ $kardex->sale->driver->name }} 
							@can('drivers.show')
							<a href="{{ route('drivers.show', $kardex->sale->driver) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
							@endcan
						</p>
						<p>
							<strong>Placa de vehiculo: </strong> {{ $kardex->sale->vehicle->plaque }} 
							@can('vehicles.show')
							<a href="{{ route('vehicles.show', $kardex->sale->vehicle) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
							@endcan
						</p>
					@endif
					<p><strong>Saldo a la fecha: </strong> {{ $kardex->balance }}</p>
					
					<p><strong>Tipo: </strong>
						@if($kardex->type == 'INPUT')
							ENTRADA
						@elseif($kardex->type == 'OUTPUT')
							SALIDA
						@endif
					</p>
				</div>
				<div class="panel-footer">
					<p><strong>Registrado por: </strong> {{ $kardex->user->name }} <span class="pull-right"><strong>Fecha:</strong> {{ $kardex->created_at }}</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection