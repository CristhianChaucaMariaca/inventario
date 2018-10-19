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
					Lista de Usuarios
					
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th>Usuario</th>
								<th>E-mail</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($users as $user)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
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
