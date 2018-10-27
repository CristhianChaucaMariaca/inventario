@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Exportaciones
					@can('sales.create')
					<a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-airplane"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
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
									<td>{{ $sale->unitary*$sale->cuantity }}</td>
									@if($sale->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($sale->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
									<td width="10px">
										@can('sales.show')
										<a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('sales.edit')
										<a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('sales.destroy')
										{!! Form::open(['route'=>['sales.destroy', $sale->id],'method'=>'DELETE']) !!}
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
					{{ $sales->render() }}
				</div>
				<div class="panel-footer">
					@can('reports.export')
					<a href="{{ route('export') }}" class="btn btn-sm btn-default"><span class="icon-file-pdf"></span></a>
					@endcan
				</div>
			</div>
		</div>
	</div>
</div>
@endsection