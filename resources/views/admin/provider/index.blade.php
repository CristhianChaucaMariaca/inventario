@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de provideros
					<a href="{{ route('providers.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($providers as $provider)
								<tr>
									<td>
										{{ $provider->id}}
									</td>
									<td>{{ $provider->name }}</td>
									<td><a href="{{ route('providers.show', $provider->id) }}" class="btn btn-sm btn-default">Ver</a></td>
									<td><a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-sm btn-default">Editar</a></td>
									<td>
										{!! Form::open(['route'=>['providers.destroy', $provider->id],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												Eliminar
											</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $providers->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection