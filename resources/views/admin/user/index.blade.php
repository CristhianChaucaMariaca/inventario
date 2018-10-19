@extends('layouts.app')
@section('content')
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
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>
										{{ $user->id}}
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