@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Lista de Reportes <span class="icon-file-pdf"></span></h3>
				</div>
				<div class="panel-body">
					<table class="table-hover table table-striped">
						<thead>
							<tr>
								<td>Reporte</td>
								<td>&nbsp;</td>
							</tr>
						</thead>
						<tbody>
							@can('reports.kardexes')
							<tr>
								<td>Kardex General</td>
								<td width="10px"><a href="{{ route('kardexs') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
							</tr>
							@endcan
							@can('reports.export')
							<tr>
								<td>Exportaciones</td>
								<td width="10px"><a href="{{ route('export') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
							</tr>
							@endcan
							@can('reports.buyreport')
							<tr>
								<td>Compras</td>
								<td width="10px"><a href="{{ route('buyreport') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
							</tr>
							@endcan
							@can('reports.drivers')
							<tr>
								<td>Conductores</td>
								<td width="10px"><a href="{{ route('drivers_pdf') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
							</tr>
							@endcan
							@can('reports.products')
							<tr>
								<td>Productos</td>
								<td width="10px"><a href="{{ route('products_pdf') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
							</tr>
							@endcan
							@can('reports.providers')
							<tr>
								<td>Proveedores</td>
								<td width="10px"><a href="{{ route('providers_pdf') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
							</tr>
							@endcan
							@can('reports.users')
							<tr>
								<td>Usuarios</td>
								<td width="10px"><a href="{{ route('users_pdf') }}" class="btn btn-info"><span class="icon-cloud-download"></span></a></td>
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