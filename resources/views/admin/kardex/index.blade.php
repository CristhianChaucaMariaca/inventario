@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Lista de Movimientos</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Stock</th>
								<th>Valor</th>
								<th>Tipo</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($kardexs as $kardex)
								<tr>
									<td>
										{{ $kardex->id}}
									</td>
										<td>
											<a href="{{ route('kardex', $kardex->product_id) }}">{{ $kardex->product->name }}</a>
										</td>
									@if($kardex->type == 'INPUT')
										<td>
										{{ $kardex->buy->cuantity }}
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
										{{ $kardex->sale->cuantity }}
										</td>
									@endif
									<td>{{ $kardex->balance }}</td>
									<td>{{ $kardex->value }}</td>
									@if($kardex->type == 'INPUT')
										<td>
											ENTRADA
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
											SALIDA
										</td>
									@endif
									@can('kardexes.show')
									<td width="10px"><a href="{{ route('kardexes.show', $kardex->id) }}" class="btn btn-sm btn-info"><span class="icon-eye-plus"></span></a></td>
									@endcan
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $kardexs->render() }}
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection