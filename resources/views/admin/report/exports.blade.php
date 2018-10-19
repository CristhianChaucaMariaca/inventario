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
					<h3 class="text-center">Lista de Exportaciones</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Nro</th>
								<th>Producto</th>
								<th>Unitario</th>
								<th>Cantidad</th>
								<th>Costo</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Conductor</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($sales as $sale)
								<tr>
									<td><?php echo "".$c++; ?></td>
									<td>{{ $sale->product->name }}</td>
									<td>{{ $sale->unitary }}</td>
									<td>{{ $sale->cuantity }}</td>
									<td>{{ $sale->unitary*$sale->cuantity }}</td>
									<td>{{ $sale->created_at }}</td>
									@if($sale->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($sale->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
									<td>{{ $sale->driver->name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
