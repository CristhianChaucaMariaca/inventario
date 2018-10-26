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
					<h3>{{ $driver->name.' '.$driver->last_name }}</h3>
				</div>
				<div class="panel-body">
					<p><strong><span class="icon-phone"></span></strong> {{ $driver->phone }}</p>
					<p><strong><span class="icon-location"></span></strong> {{ $driver->address }}</p>
					<p><strong><span class="icon-profile"></span></strong> {{ $driver->ci }}</p>
					<p><strong><span class="icon-truck"></span></strong> {{ $driver->license }}</p>
					<p><strong>Estado: </strong>
						@if($driver->status == 'FREE')
								<span>LIBRE</span>
						@elseif($driver->status == 'OCCUPIED')
							<span>OCUPADO</span>
						@elseif($driver->status == 'OUT')
							<span>FUERA DE SERVICIO</span>
						@endif
					</p>
					@if($driver->user->email)
						<p><strong>Gerente: </strong>{{ $driver->user->name }}</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
