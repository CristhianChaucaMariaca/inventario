@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $driver->name.' '.$driver->last_name }}</h3>
				</div>
				<div class="panel-body">
					<p><strong><span class="icon-phone"></span></strong> {{ $driver->phone }}</p>
					<p><strong><span class="icon-location"></span></strong> {{ $driver->address }}</p>
					<p><strong><span class="icon-profile"></span></strong> {{ $driver->ci }}</p>
					<p><strong><span class="icon-truck"></span></strong> {{ $driver->license }}</p>
					<p><strong>Estado: </strong>
						@if($driver->status == 'FREE')
								<span>LIBRE</span>
						@elseif($driver->status == 'OCCUPIED')
							<span>OCUPADO</span>
						@elseif($driver->status == 'OUT')
							<span>FUERA DE SERVICIO</span>
						@endif
					</p>
					@if($driver->user->email)
						<p><strong>Gerente: </strong>{{ $driver->user->name }}</p>
					@endif

				</div>
			</div>
			@can('sales.index')
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					Lista de Exportaciones de <strong><span class="text-info">{{ $driver->name.' '.$driver->last_name }}</span></strong>
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