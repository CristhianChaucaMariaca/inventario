@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de productos
					@can('products.create')
						<a href="{{ route('products.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">#</th>
								<th>Producto</th>
								<th>Medida</th>
								<th>Estado</th>
								<th colspan="5">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($products as $product)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $product->name }}</td>
									<td>{{ $product->unidad }}</td>
										@if($product->status == 'PUBLIC')
											<td>
												<span class="icon-unlocked text-primary"></span>
											</td>
										@elseif($product->status == 'PRIVATE')
											<td>
												<span class="icon-lock text-danger"></span>
											</td>
										@endif
									<td width="10px">
										@can('products.show')
										<a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('products.edit')
										<a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('products.destroy')
										{!! Form::open(['route'=>['products.destroy', $product->id],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												<span class="icon-bin2"></span>
											</button>
										{!! Form::close() !!}
										@endcan
									</td>
									<td><a href="{{ route('kardex', $product->id) }}" class="btn btn-sm btn-default"><span class="icon-file-text"></span></a></td>
									<td>
										@can('buys.create')
										<a href="{{ route('buys.create') }}" class="btn btn-sm btn-default">iniciar stock</a>
										@endcan
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