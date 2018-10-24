@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					{{ Form::open(['route'=>'providers.index','method'=>'GET','class'=>'form-inline pull-right']) }}

						<div class="form-group">
							{{ Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre']) }}
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><span class="icon-search"></span></button>
						</div>

					{{ Form::close() }}
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de proveedores
					@can('providers.create')
					<a href="{{ route('providers.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">#</th>
								<th>Proveedor</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($providers as $provider)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $provider->name }}</td>
									<td width="10px">
										@can('providers.show')
										<a href="{{ route('providers.show', $provider->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('providers.edit')
										<a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('providers.destroy')
										{!! Form::open(['route'=>['providers.destroy', $provider->id],'method'=>'DELETE']) !!}
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
					{{ $providers->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection