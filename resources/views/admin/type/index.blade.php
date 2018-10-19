@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Tipos de productos
					@can('types.create')
					<a href="{{ route('types.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th width="10px">id</th>
								<th>Tipo</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($types as $type)
								<tr>
									<td>
										{{ $type->id}}
									</td>
									<td>{{ $type->name }}</td>
									<td width="10px">
										@can('types.show')
										<a href="{{ route('types.show', $type->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('types.edit')
										<a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('types.destroy')
										{!! Form::open(['route'=>['types.destroy', $type->id],'method'=>'DELETE']) !!}
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection