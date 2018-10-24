@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					{{ Form::open(['route'=>'users.index','method'=>'GET','class'=>'form-inline pull-right']) }}
						<div class="form-group">
							{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Usuario']) }}
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><span class="icon-search"></span></button>
						</div>
					{{ Form::close() }}
				</div>
			</div>
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
									<td width="10px">
										@can('users.show')
										<a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('users.edit')
										<a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('users.destroy')
										{!! Form::open(['route'=>['users.destroy', $user],'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-danger">
												<span class="icon-bin2"></span>
											</button>
										{!! Form::close() !!}
										@endcan
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $users->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection