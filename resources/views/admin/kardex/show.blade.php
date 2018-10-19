@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Codigo de registro: <h3>{{ $kardex->id }}</h3>
				</div>
				<div class="panel-body">
					@if($kardex->type == 'INPUT')
						<p><strong>Producto: </strong> {{ $kardex->buy->product->name }}</p>
						<p><strong>Cantidad adquirida: </strong>{{ $kardex->buy->cuantity }}</p>
						<p><strong>Costo total: </strong> {{ $kardex->buy->cost }}</p>
						<p><strong>Precio unitario: </strong> {{ $kardex->buy->unitary }}</p>
					@elseif($kardex->type == 'OUTPUT')
						<p><strong>Producto: </strong> {{ $kardex->sale->product->name }}</p>
						<p><strong>Cantidad adquirida: </strong>{{ $kardex->sale->cuantity }}</p>
						<p><strong>Costo total: </strong> </p>
						<p><strong>Precio unitario: </strong> {{ $kardex->sale->unitary }}</p>
					@endif
					<p><strong>Saldo a la fecha: </strong> {{ $kardex->balance }}</p>
					
					<p><strong>Tipo: </strong>
						@if($kardex->type == 'INPUT')
							ENTRADA
						@elseif($kardex->type == 'OUTPUT')
							SALIDA
						@endif
					</p>
				</div>
				<div class="panel-footer">
					<p><strong>Registrado por: </strong> {{ $kardex->user->name }} <span class="pull-right"><strong>Fecha:</strong> {{ $kardex->created_at }}</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection