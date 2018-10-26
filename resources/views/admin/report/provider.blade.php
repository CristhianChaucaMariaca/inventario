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
					<h3>{{ $provider->name }}</h3>
				</div>
				<div class="panel-body">
					<p><strong>Direccion: </strong> {{ $provider->address }}</p>
					<p><strong>Telefono: </strong>{{ $provider->phone }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
