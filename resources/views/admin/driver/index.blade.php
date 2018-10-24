@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					{{ Form::open(['route'=>'drivers.index','method'=>'GET','class'=>'form-inline pull-right']) }}
						
						<div class="form-group">
							{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de conductor']) }}
						</div>
						<div class="form-group">
							{{ Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Apellido de conductor']) }}
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><span class="icon-search"></span></button>
						</div>

					{{ Form::close() }}
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de conductores
					@can('drivers.create')
					<a href="{{ route('drivers.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($drivers as $driver)
								<tr>
									<td>
										<?php echo "".$c++; ?>
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
									<td width="10px">
										@can('drivers.show')
										<a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('drivers.edit')
										<a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('drivers.destroy')
										{!! Form::open(['route'=>['drivers.destroy', $driver->id],'method'=>'DELETE']) !!}
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
					{{ $drivers->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection