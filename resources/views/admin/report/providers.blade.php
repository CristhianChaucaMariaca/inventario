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
					<h3 class="text-center">Lista de Proveedores</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">#</th>
								<th>Proveedor</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($providers as $provider)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $provider->name }}</td>
									<td>{{ $provider->address }}</td>
									<td>{{ $provider->phone }}</td>
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
