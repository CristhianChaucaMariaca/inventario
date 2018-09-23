@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Ventas
					<a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>Producto</th>
								<th>Costo</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sales as $sale)
								<tr>
									<td>
										{{ $sale->id}}
									</td>
									<td>{{ $sale->product->name }}</td>
									<td>{{ $sale->cost }}</td>
									@if($sale->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($sale->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
									<td><a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-default">Ver</a></td>
									<td><a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-default">Editar</a></td>
									<td>
										{!! Form::open(['route'=>['sales.destroy', $sale->id],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												Eliminar
											</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $sales->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection