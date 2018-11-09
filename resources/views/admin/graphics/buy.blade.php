<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Codigo de compra: <h3>{{ $buy->id }}</h3>
				</div>
				<div class="panel-body">
					<p><strong>Producto: </strong> {{ $buy->product->name }}</p>
					<p><strong>Proveedor: </strong> {{ $buy->provider->name }}</p>
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
</body>
</html>
