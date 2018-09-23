@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Tipos de productos
					<a href="{{ route('drivers.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($drivers as $driver)
								<tr>
									<td>
										{{ $driver->id}}
									</td>
									<td>{{ $driver->name }}</td>
									<td>{{ $driver->last_name }}</td>								
									<td>
										@if($driver->status == 'FREE')
											Libre
										@elseif($driver->status == 'OCCUPIED')
											Ocupado
										@elseif($driver->status == 'OUT')
											Fuera
										@endif
									</td>								
									<td><a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-sm btn-default">Ver</a></td>
									<td><a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-default">Editar</a></td>
									<td>
										{!! Form::open(['route'=>['drivers.destroy', $driver->id],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												Eliminar
											</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $drivers->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection