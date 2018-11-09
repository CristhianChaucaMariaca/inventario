@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Roles del sistema
					@can('roles.create')
					<a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th width="10px">id</th>
								<th>Rol</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
								<tr>
									<td>
										{{ $role->id}}
									</td>
									<td>{{ $role->name }}</td>							
									<td width="10px">
										@can('roles.show')
										<a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('roles.edit')
										<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('roles.destroy')
										{!! Form::open(['route'=>['roles.destroy', $role->id],'method'=>'DELETE']) !!}
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
					{{ $roles->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection