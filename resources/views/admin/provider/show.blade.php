@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $provider->name }}
						@can('reports.provider')
							<a href="{{ route('detalleprovider',$provider) }}" class="btn btn-default pull-right"><span class="icon-file-pdf"></span></a>
						@endcan
					</h3>
				</div>
				<div class="panel-body">
					<p><strong>Direccion: </strong> {{ $provider->address }}</p>
					<p><strong>Telefono: </strong>{{ $provider->phone }}</p>
				</div>
			</div>
			@can('buys.index')
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de compras de <strong><span class="text-info">{{ $provider->name }}</span></strong>
					@can('reports.buysprovider')
					<a href="{{ route('buysprovider', $provider) }}" class="btn btn-sm btn-default"><span class="icon-file-pdf"></span></a>
					@endcan
					@can('buys.create')
					<a href="{{ route('buys.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-cart"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
								<th>producto</th>
								<th>Proveedor</th>
								<th>Cantidad</th>
								<th>Costo</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($provider->buys as $buy)
								<tr>
									<td>
										{{ $buy->id}}
									</td>
									<td>{{ $buy->product->name }}</td>
									<td>{{ $buy->provider->name }}</td>
									<td>{{ $buy->cuantity }}</td>
									<td>{{ $buy->unitary*$buy->cuantity }}</td>
									@if($buy->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($buy->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
									<td width="10px">
										@can('buys.show')
										<a href="{{ route('buys.show', $buy->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('buys.edit')
										<a href="{{ route('buys.edit', $buy->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('buys.destroy')
										{!! Form::open(['route'=>['buys.destroy', $buy->id],'method'=>'DELETE']) !!}
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