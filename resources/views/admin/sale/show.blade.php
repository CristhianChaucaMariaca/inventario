@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Codigo de Exportación: <h3>{{ $sale->id }} 
					@can('reports.venta')
					<a href="{{ route('venta',$sale) }}" class="btn btn-default pull-right"><span class="icon-file-pdf"></span></a>
					@endcan
					</h3>

				</div>
				<div class="panel-body">
					<p>
						<strong>Producto: </strong> {{ $sale->product->name }} 
						@can('products.show')
						<a href="{{ route('products.show', $sale->product) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
						@endcan
					</p>
					<p><strong>Cantidad adquirida: </strong>{{ $sale->cuantity }}</p>
					<p><strong>Costo total: </strong> {{ $sale->unitary*$sale->cuantity }}</p>
					<p>
						<strong>Conductor: </strong> {{ $sale->driver->name }}
						@can('drivers.show')
						<a href="{{ route('drivers.show', $sale->driver) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
						@endcan
					</p>
					<p>
						<strong>Placa de Vehiculo: </strong> {{ $sale->vehicle->plaque }} 
						@can('vehicles.show')
						<a href="{{ route('vehicles.show', $sale->vehicle) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
						@endcan
					</p>
					<p><strong>Estado: </strong>
						@if($sale->status == 'PENDING')
							Pendiente
						@elseif($sale->status == 'FINISHED')
							Finalizado
						@endif
					</p>
				</div>
				<div class="panel-footer">
					<p><strong>Registrado por: </strong> {{ $sale->user->name }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection