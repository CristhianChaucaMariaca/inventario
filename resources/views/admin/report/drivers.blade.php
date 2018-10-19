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
					<h3 class="text-center">Lista de Conductores</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Telefono</th>
								<th>Dirección</th>
								<th>Cedula</th>
								<th>Licencia</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($drivers as $driver)
								<tr>
									<td>
										<?php echo "".$c++; ?>
									</td>
									<td>{{ $driver->name }}</td>
									<td>{{ $driver->last_name }}</td>
									<td>{{ $driver->phone }}</td>
									<td>{{ $driver->address }}</td>
									<td>{{ $driver->ci }}</td>
									<td>{{ $driver->license }}</td>
									<td>
										@if($driver->status == 'FREE')
											Libre
										@elseif($driver->status == 'OCCUPIED')
											Ocupado
										@elseif($driver->status == 'OUT')
											Fuera
										@endif
									</td>								
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
