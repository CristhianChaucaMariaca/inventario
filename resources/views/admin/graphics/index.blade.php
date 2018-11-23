@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Lista de Graficos <span class="icon-file-pdf"></span></h3>
				</div>
				<div class="panel-body">
					<table class="table-hover table table-striped">
						<thead>
							<tr>
								<td>Graficos</td>
								<td>&nbsp;</td>
							</tr>
						</thead>
						<tbody>
							@can('graphics.stoksgraphics')
							<tr>
								<td>Grafico Kardex General</td>
								@can('graphics.stock_year')
								<td width="10px"><a href="{{ route('stock_year') }}" class="btn btn-info">Anual</a></td>
								@endcan
								@can('graphics.stock_month')
								<td width="10px"><a href="{{ route('stock_month') }}" class="btn btn-info">Mensual</a></td>
								@endcan
								@can('graphics.stock_today')
								<td width="10px"><a href="{{ route('stock_today') }}" class="btn btn-info">Hoy</a></td>
								@endcan
								@can('graphics.stoksgraphics')
								<td width="10px"><a href="{{ route('stoksgraphics') }}" class="btn btn-info"><span class="icon-stats-bars"></span></a></td>
								@endcan
							</tr>
							@endcan
							@can('graphics.salesgraphics')
							<tr>
								<td>Grafico Exportaciones General</td>
								@can('graphics.sales_year')
								<td width="10px"><a href="{{ route('sales_year') }}" class="btn btn-info">Anual</a></td>
								@endcan
								@can('graphics.sales_month')
								<td width="10px"><a href="{{ route('sales_month') }}" class="btn btn-info">Mensual</a></td>
								@endcan
								@can('graphics.sales_today')
								<td width="10px"><a href="{{ route('sales_today') }}" class="btn btn-info">Hoy</a></td>
								@endcan
								@can('graphics.salesgraphics')
								<td width="10px"><a href="{{ route('salesgraphics') }}" class="btn btn-info"><span class="icon-stats-bars"></span></a></td>
								@endcan
							</tr>
							@endcan
							@can('graphics.buysgraphics')
							<tr>
								<td>Grafico Compras</td>
								@can('graphics.buy_year')
								<td width="10px"><a href="{{ route('buy_year') }}" class="btn btn-info">Anual</a></td>
								@endcan
								@can('graphics.buy_month')
								<td width="10px"><a href="{{ route('buy_month') }}" class="btn btn-info">mensual</a></td>
								@endcan
								@can('graphics.buy_today')
								<td width="10px"><a href="{{ route('buy_today') }}" class="btn btn-info">Hoy</a></td>
								@endcan
								@can('graphics.buysgraphics')
								<td width="10px"><a href="{{ route('buysgraphics') }}" class="btn btn-info"><span class="icon-stats-bars"></span></a></td>
								@endcan
							</tr>
							@endcan
							@can('graphics.buy_config')
							<tr>
								<td>Grafico avanzado de compras</td>
									<td colspan="4">
									{{ Form::open(['route'=>'buy_config','method'=>'GET','class'=>'form-inline pull-right']) }}
											<div class="form-group">
												<div class="form-group">
												{!! Form::select('product',$products,null,['class'=>'form-control']) !!}
											</div>
										
											<div class="form-group">
												{!! Form::select('date',['today'=>'Hoy','month'=>'Mensual','year'=>'Anual',''=>'General'],null,['class'=>'form-control']) !!}
											</div>
										
											<div class="form-group">
												<button class="btn btn-primary">ver</button>
											</div>
									{{ Form::close() }}
									</td>
							</tr>
							@endcan
							@can('graphics.sales_config')
							<tr>
								<td>Grafico avanzado de ventas</td>
									<td colspan="4">
									{{ Form::open(['route'=>'sales_config','method'=>'GET','class'=>'form-inline pull-right']) }}
											<div class="form-group">
												<div class="form-group">
												{!! Form::select('product',$products,null,['class'=>'form-control']) !!}
											</div>
										
											<div class="form-group">
												{!! Form::select('date',['today'=>'Hoy','month'=>'Mensual','year'=>'Anual',''=>'General'],null,['class'=>'form-control']) !!}
											</div>
										
											<div class="form-group">
												<button class="btn btn-primary">ver</button>
											</div>
									{{ Form::close() }}
									</td>
							</tr>
							@endcan
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection