@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Codigo de compra: {{ $buy->id }}
						@can('reports.buypdf')
						<a href="{{ route('buypdf',$buy) }}" class="btn btn-default pull-right"><span class="icon-file-pdf"></span></a>
						@endcan
					</h3>
				</div>
				<div class="panel-body">
					<p>
						<strong>Producto: </strong> {{ $buy->product->name }} 
						@can('products.show')
						<a href="{{ route('products.show', $buy->product) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
						@endcan
					</p>
					<p>
						<strong>Proveedor: </strong> {{ $buy->provider->name }} 
						@can('providers.show')
						<a href="{{ route('providers.show', $buy->provider) }}" class="btn btn-default"><span class="icon-eye-plus"></span></a>
						@endcan
					</p>
					<p><strong>Cantidad adquirida: </strong>{{ $buy->cuantity }}</p>
					<p><strong>Costo total: </strong> {{ $buy->unitary*$buy->cuantity }}</p>
					<p><strong>Costo unitario: </strong> {{ $buy->unitary }}</p>
					<p><strong>Estado: </strong>
						@if($buy->status == 'PENDING')
							Pendiente
						@elseif($buy->status == 'FINISHED')
							Finalizado
						@endif
					</p>
				</div>
				<div class="panel-footer">
					<p><strong>Registrado por: </strong> {{ $buy->user->name }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection