@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Detalle de tipo de producto
				</div>
				<div class="panel-body">
					<p><strong><span class="icon-phone"></span></strong> {{ $type->name }}</p>
					<p><strong><span class="icon-location"></span></strong> {{ $type->measure->no }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection