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
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Lista de Movimientos</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>producto</th>
								<th>Cantidad</th>
								<th>Stock</th>
								<th>Valor</th>
								<th>Tipo</th>
								<th>fecha</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($kardexs as $kardex)
								<tr>
									<td>
										<?php echo "".$c++; ?>
									</td>
									@if($kardex->type == 'INPUT')
										<td>
										{{ $kardex->product->name }}
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
										{{ $kardex->product->name }}
										</td>
									@endif
									@if($kardex->type == 'INPUT')
										<td>
										{{ $kardex->buy->cuantity }}
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
										{{ $kardex->sale->cuantity }}
										</td>
									@endif
									<td>{{ $kardex->balance }}</td>
									<td>{{ $kardex->value }}</td>
									@if($kardex->type == 'INPUT')
										<td>
											ENTRADA
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
											SALIDA
										</td>
									@endif
									<td>{{ $kardex->created_at }}</td>
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
