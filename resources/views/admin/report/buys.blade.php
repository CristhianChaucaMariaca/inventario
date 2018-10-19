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
					<h3 class="text-center">Lista de Compras</h3>
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
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($buys as $buy)
								<tr>
									<td><?php echo "".$c++; ?></td>
									<td>{{ $buy->product->name }}</td>
									<td>{{ $buy->unitary }}</td>
									<td>{{ $buy->cuantity }}</td>
									<td>{{ $buy->unitary*$buy->cuantity }}</td>
									<td>{{ $buy->created_at }}</td>
									@if($buy->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($buy->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
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
