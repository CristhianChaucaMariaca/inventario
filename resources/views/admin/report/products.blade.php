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
					<h3 class="text-center">Lista de Productos</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">#</th>
								<th>Tipo</th>
								<th>Producto</th>
								<th>Medida</th>
								<th>Minimo</th>
								<th>Estado</th>
								<th colspan="5">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($products as $product)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $product->type->name }}</td>
									<td>{{ $product->name }}</td>
									<td>{{ $product->type->measure->no }}</td>
									<td>{{ $product->min }}</td>
										@if($product->status == 'PUBLIC')
											<td>
												Publico
											</td>
										@elseif($product->status == 'PRIVATE')
											<td>
												Privado
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
