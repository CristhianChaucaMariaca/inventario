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
					<h3>{{ $product->name }}</h3>
				</div>
				<div class="panel-body">
					<p><strong>Tipo de producto: </strong>{{ $product->type->name }}</p>
					<p><strong>Unidad de Medida: </strong> {{ $product->type->measure->no }}</p>
					<p><strong>Stock minimo: </strong>{{ $product->min }}</p>
					<p><strong>Estado: </strong>
						@if($product->status == 'PUBLIC')
							<span>Publico</span>
						@elseif($product->status == 'PRIVATE')
							<span>privado</span>
						@endif
					</p>

				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
