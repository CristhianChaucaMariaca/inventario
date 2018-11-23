@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
						{{ Form::open(['route'=>'kardexes.index','method'=>'GET','class'=>'form-inline pull-right']) }}
						<div class="form-group">
							{!! Form::select('date',['today'=>'Hoy','month'=>'Mensual','year'=>'Anual',''=>'General'],null,['class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							<button class="btn btn-primary">ver</button>
						</div>
					{{ Form::close() }}
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Lista de Movimientos</h3>
					@can('graphics.stoksgraphics')
						<a href="{{ route('stoksgraphics') }}" class="btn btn-default"><span class=" icon-stats-dots"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Costo unitario</th>
								<th>Total (compra/exportacion)</th>
								<th>Stock</th>
								<th>ppp</th>
								<th>Total</th>
								<th>Tipo</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$c=1;
							?>
							@foreach($kardexs as $kardex)
								<tr>
									<td>
										<?php
											echo $c++;
										?>
									</td>
										<td>
											<a href="{{ route('kardex', $kardex->product_id) }}">{{ $kardex->product->name }}</a>
										</td>
									@if($kardex->type == 'INPUT')
										<td>
										{{ $kardex->in->cuantity }}
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
										{{ $kardex->output->cuantity }}
										</td>
									@endif
									@if($kardex->type == 'INPUT')
										<td>
										{{ $kardex->in->value }}
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
										{{ $kardex->output->value }}
										</td>
									@endif
									@if($kardex->type == 'INPUT')
										<td>
										{{ $kardex->in->value*$kardex->in->cuantity }}
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
										{{ $kardex->output->value*$kardex->output->cuantity }}
										</td>
									@endif
									<td>{{ $kardex->balance }}</td>
									<td>{{ $kardex->value / $kardex->balance }}</td>
									<td>{{ $kardex->value }}</td>
									@if($kardex->type == 'INPUT')
										<td>
											ENTRADA
										</td>
									@elseif($kardex->type == 'OUTPUT')
										<td>
											SALIDA
										</td>
									@endif
									@can('kardexes.show')
									<td width="10px"><a href="{{ route('kardexes.show', $kardex->id) }}" class="btn btn-sm btn-info"><span class="icon-eye-plus"></span></a></td>
									@endcan
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $kardexs->render() }}
				</div>
				<div class="panel-footer">
					@can('reports.kerdexes')
						<a href="{{route('kardexs')}}" class="btn btn-defult"><span class="icon-file-pdf"></span></a>
					@endcan
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection