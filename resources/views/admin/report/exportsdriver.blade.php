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
