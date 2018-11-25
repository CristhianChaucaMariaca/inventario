@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					{{ Form::open(['route'=>'sales.index','method'=>'GET','class'=>'form-inline pull-right']) }}
						<div class="form-group">
							<div class="form-group">
							@if($products->count())
								{!! Form::select('product',$products,null,['class'=>'form-control']) !!}
							@else
								{!! Form::select('product',$products,null,['class'=>'form-control','disabled']) !!}
							@endif
						</div>
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
					Lista de Exportaciones
					@can('graphics.salesgraphics')
						<a href="{{ route('salesgraphics') }}" class="btn btn-default"><span class=" icon-stats-dots"></span></a>
					@endcan
					@can('sales.create')
					<a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary pull-right"><span class="icon-airplane"></span></a>
					@endcan
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<td width="10px">id</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Costo</th>
								<th>Unitario</th>
								<th>Est. Ganancia</th>
								<th>Estado</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$c=1;
							?>
							@foreach($sales as $sale)
								<tr>
									<td>
										<?php
											echo $c++;
										?>
									</td>
									<td>{{ $sale->product->name }} ({{ $sale->product->type->name }})</td>
									<td>{{ $sale->cuantity }}</td>
									<td>{{ $sale->unitary*$sale->cuantity }}</td>
									<td>{{ $sale->unitary }}</td>
									<td>
										@if($sale->kardex)
										{{ (($sale->unitary * $sale->cuantity) - (($sale->kardex->value/$sale->kardex->balance)*$sale->cuantity)) }}
										@else
											<span class="icon-blocked text-danger"></span>
										@endif
									</td>
									@if($sale->status == 'PENDING')
										<td>
											Pendiente
										</td>
									@elseif($sale->status == 'FINISHED')
										<td>
											Finalizado
										</td>
									@endif
									<td width="10px">
										@can('sales.show')
										<a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-default"><span class="icon-eye-plus"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('sales.edit')
										<a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-default"><span class="icon-wrench"></span></a>
										@endcan
									</td>
									<td width="10px">
										@can('sales.destroy')
										{!! Form::open(['route'=>['sales.destroy', $sale->id],'method'=>'DELETE']) !!}
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
					{{ $sales->render() }}
				</div>
				<div class="panel-footer">
					@can('reports.export')
					<a href="{{ route('export') }}" class="btn btn-sm btn-default"><span class="icon-file-pdf"></span></a>
					@endcan
				</div>
			</div>
		</div>
	</div>
</div>
@endsection