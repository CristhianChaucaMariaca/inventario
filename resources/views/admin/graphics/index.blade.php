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
								<td width="10px"><a href="{{ route('stock_year') }}" class="btn btn-info">Anual</a></td>
								<td width="10px"><a href="{{ route('stock_month') }}" class="btn btn-info">Mensual</a></td>
								<td width="10px"><a href="{{ route('stock_today') }}" class="btn btn-info">Hoy</a></td>
								<td width="10px"><a href="{{ route('stoksgraphics') }}" class="btn btn-info"><span class="icon-stats-bars"></span></a></td>
							</tr>
							@endcan
							@can('graphics.salesgraphics')
							<tr>
								<td>Grafico Exportaciones General</td>
								<td width="10px"><a href="{{ route('sales_year') }}" class="btn btn-info">Anual</a></td>
								<td width="10px"><a href="{{ route('sales_month') }}" class="btn btn-info">Mensual</a></td>
								<td width="10px"><a href="{{ route('sales_today') }}" class="btn btn-info">Hoy</a></td>
								<td width="10px"><a href="{{ route('salesgraphics') }}" class="btn btn-info"><span class="icon-stats-bars"></span></a></td>
							</tr>
							@endcan
							@can('graphics.buysgraphics')
							<tr>
								<td>Grafico Compras</td>
								<td width="10px"><a href="{{ route('buy_year') }}" class="btn btn-info">Anual</a></td>
								<td width="10px"><a href="{{ route('buy_month') }}" class="btn btn-info">mensual</a></td>
								<td width="10px"><a href="{{ route('buy_today') }}" class="btn btn-info">Hoy</a></td>
								<td width="10px"><a href="{{ route('buysgraphics') }}" class="btn btn-info"><span class="icon-stats-bars"></span></a></td>
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