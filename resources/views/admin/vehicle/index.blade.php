@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Vehiculos
					@can('vehicles.create')
					<a href="{{ route('vehicles.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th>Placa</th>
								<th>capacidad</th>
								<th>Color</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($vehicles as $vehicle)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $vehicle->plaque }}</td>
									<td>{{ $vehicle->capacity }}</td>
									<td>{{ $vehicle->color }}</td>
									<td>{{ $vehicle->brand }}</td>
									<td>{{ $vehicle->model }}</td>
									<td>
										@if($vehicle->status == 'FREE')
											Libre
										@elseif($vehicle->status == 'OCCUPIED')
											Ocupado
										@elseif($vehicle->status == 'OUT')
											Fuera
										@endif
									</td>
									<td width="10px">
										@can('vehicles.show')
										<a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('vehicles.edit')
										<a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('vehicles.destroy')
										{!! Form::open(['route'=>['vehicles.destroy', $vehicle],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												<span class="icon-bin2"></span>
											</button>
										{!! Form::close() !!}
										@endcan
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection