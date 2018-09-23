@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de buyos
					<a href="{{ route('buys.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>name</th>
								<th>Proveedor</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($buys as $buy)
								<tr>
									<td>
										{{ $buy->id}}
									</td>
									<td>{{ $buy->product->name }}</td>
									<td>{{ $buy->provider->name }}</td>
									@if($buy->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($buy->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
									<td><a href="{{ route('buys.show', $buy->id) }}" class="btn btn-sm btn-default">Ver</a></td>
									<td><a href="{{ route('buys.edit', $buy->id) }}" class="btn btn-sm btn-default">Editar</a></td>
									<td>
										{!! Form::open(['route'=>['buys.destroy', $buy->id],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												Eliminar
											</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $buys->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection