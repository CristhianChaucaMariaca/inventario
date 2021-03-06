@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $driver->name.' '.$driver->last_name }}
					@can('reports.driver')
						<a href="{{ route('detalledriver',$driver) }}" class="btn btn-default pull-right"><span class="icon-file-pdf"></span></a>
					@endcan
					</h3>
				</div>
				<div class="panel-body">
					<p><strong><span class="icon-phone"></span> Telefono:</strong> {{ $driver->phone }}</p>
					<p><strong><span class="icon-location"></span> Dirección: </strong> {{ $driver->address }}</p>
					<p><strong><span class="icon-profile"></span> Cedula </strong> {{ $driver->ci }}</p>
					<p><strong><span class="icon-truck"></span> Licencia:</strong> {{ $driver->license }}</p>
					@if($driver->user->email)
						<p><strong>Gerente: </strong>{{ $driver->user->name }}</p>
					@endif

				</div>
			</div>
			@can('sales.index')
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					Lista de Exportaciones de <strong><span class="text-info">{{ $driver->name.' '.$driver->last_name }}</span></strong>
					<a href="{{route('exportsdriver',$driver)}}" class="btn btn-default pull right"><span class="icon-file-pdf"></span></a>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<td width="10px">#</th>
								<th>Producto</th>
								<th>Costo</th>
								<th>Estado</th>
								<th><span class="icon-calendar"></span></th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($driver->sales as $sale)
								<tr>
									<td>
										<?php echo "".$c++; ?>
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
									@if($sale->created_at)
										<td>
											{{ $sale->created_at }}
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
				</div>
			</div>
			@endcan
		</div>
	</div>
</div>
@endsection