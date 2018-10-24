@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Tipos de productos
					@can('measures.create')
					<a href="{{ route('measures.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-plus"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th width="10px">#</th>
								<th>Medida</th>
								<th>Nomenclatura</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php $c=1; ?>
							@foreach($measures as $measure)
								<tr>
									<td>
										<?php echo $c++; ?>
									</td>
									<td>{{ $measure->name }}</td>
									<td>{{ $measure->no }}</td>
									<td width="10px">
										@can('measures.show')
										<a href="{{ route('measures.show', $measure->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('measures.edit')
										<a href="{{ route('measures.edit', $measure->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('measures.destroy')
										{!! Form::open(['route'=>['measures.destroy', $measure],'method'=>'DELETE']) !!}
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