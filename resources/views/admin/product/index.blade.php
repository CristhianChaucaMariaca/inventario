@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de productos
					<a href="{{ route('products.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>name</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td>
										{{ $product->id}}
									</td>
									<td>{{ $product->name }}</td>
										@if($product->status == 'PUBLIC')
											<td>
												<span>Publico</span>
											</td>
										@elseif($product->status == 'PRIVATE')
											<td>
												<span>privado</span>
											</td>
										@endif
									<td><a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-default">Ver</a></td>
									<td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-default">Editar</a></td>
									<td>
										{!! Form::open(['route'=>['products.destroy', $product->id],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												Eliminar
											</button>
										{!! Form::close() !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $products->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection