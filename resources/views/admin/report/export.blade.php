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
					Codigo de Exportación: <h3>{{ $sale->id }}</h3>
				</div>
				<div class="panel-body">
					<p><strong>Producto: </strong> {{ $sale->product->name }}</p>
					<p><strong>Cantidad adquirida: </strong>{{ $sale->cuantity }}</p>
					<p><strong>Costo total: </strong> {{ $sale->unitary*$sale->cuantity }}</p>
					<p><strong>Conductor: </strong> {{ $sale->driver->name }}</p>
					<p><strong>Estado: </strong>
						@if($sale->status == 'PENDING')
							Pendiente
						@elseif($sale->status == 'FINISHED')
							Finalizado
						@endif
					</p>
				</div>
				<div class="panel-footer">
					<p><strong>Registrado por: </strong> {{ $sale->user->name }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
