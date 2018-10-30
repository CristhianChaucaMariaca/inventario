@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Detalle de vehiculo
				</div>
				<div class="panel-body">
					<p><strong>Placa</span></strong> {{ $vehicle->plaque }}</p>
					<p><strong>Capacidad</strong> {{ $vehicle->capacity }}</p>
					<p><strong>Color</strong> {{ $vehicle->color }}</p>
					<p><strong>Marca</strong> {{ $vehicle->brand }}</p>
					<p><strong>Modelo</strong> {{ $vehicle->model }}</p>
					<p><strong>Estado: </strong>
						@if($vehicle->status == 'FREE')
								<span>LIBRE</span>
						@elseif($vehicle->status == 'OCCUPIED')
							<span>OCUPADO</span>
						@elseif($vehicle->status == 'OUT')
							<span>FUERA DE SERVICIO</span>
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection