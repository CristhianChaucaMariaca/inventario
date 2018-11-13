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
					<p>
						<strong>Tipo: </strong> {{ $sale->product->type->name }}
					</p>
					<p>
						<strong>Unidad de medida: </strong> {{ $sale->product->type->measure->name }} ({{ $sale->product->type->measure->no }})
					</p>
					
					<p><strong>Cantidad adquirida: </strong>{{ $sale->cuantity }}</p>
					<p><strong>Costo total: </strong> {{ $sale->unitary*$sale->cuantity }}</p>
					<p><strong>Costo unitario: </strong> {{ $sale->unitary }}</p>
					@if($sale->kardex)
						<p>
							<strong>Ganancia estimada: </strong> {{ (($sale->unitary * $sale->cuantity) - (($sale->kardex->value/$sale->kardex->balance)*$sale->cuantity)) }}
						</p>
					@endif
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