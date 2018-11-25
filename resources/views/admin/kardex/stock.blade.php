@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Stocks de los productos</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Producto</th>
								<th>Stock Minimo</th>
								<th>Stock</th>
								<th colspan="3">Acciones</th>
							</tr>
						</thead>
						<tbody>

							@foreach($stocks as $stock)
								<tr>
									<td>{{ $stock->product->name }} 
										@can('products.show')
										<a href="{{ route('products.show', $stock->product_id) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
										@endcan</td>
									<td>{{ $stock->product->min }}</td>
									<td>{{ $stock->balance }}</td>
									<td width="10"><a href="{{ route('kardex', $stock->product_id) }}" class="btn btn-sm btn-default">Kardex del producto</a>
									</td>
									<td>
									@can('buys.create')
									<td width="10"><a href="{{ route('buys.create') }}" class="btn btn-primary">Comprar</a></td>
									@endcan
									@can('sales.create')
									<td width="10"><a href="{{ route('sales.create') }}" class="btn btn-primary">Exportar</a></td>
									@endcan
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