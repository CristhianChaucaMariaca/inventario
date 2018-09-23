@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $driver->name.' '.$driver->last_name }}</h3>
				</div>
				<div class="panel-body">
					<p><strong>Telefono: </strong> {{ $driver->phone }}</p>
					<p><strong>Direccion: </strong>{{ $driver->address }}</p>
					<p><strong>Cedula: </strong>{{ $driver->ci }}</p>
					<p><strong>Licencia de conducir: </strong>{{ $driver->license }}</p>
					<p><strong>Estado: </strong>
						@if($driver->status == 'FREE')
								<span>LIBRE</span>
						@elseif($driver->status == 'OCCUPIED')
							<span>OCUPADO</span>
						@elseif($driver->status == 'OUT')
							<span>FUERA DE SERVICIO</span>
						@endif
					</p>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection