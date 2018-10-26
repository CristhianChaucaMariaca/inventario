@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $provider->name }}
						@can('reports.provider')
							<a href="{{ route('detalleprovider',$provider) }}" class="btn btn-default pull-right"><span class="icon-file-pdf"></span></a>
						@endcan
					</h3>
				</div>
				<div class="panel-body">
					<p><strong>Direccion: </strong> {{ $provider->address }}</p>
					<p><strong>Telefono: </strong>{{ $provider->phone }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection