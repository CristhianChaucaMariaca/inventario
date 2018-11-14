@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Detalle de medida
				</div>
				<div class="panel-body">
					<p><strong>Medida:</strong> {{ $measure->name }}</p>
					<p><strong>Nomenclatura:</strong> {{ $measure->no }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection