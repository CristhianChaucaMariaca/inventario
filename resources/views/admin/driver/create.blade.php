@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Añadir conductor</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['route'=>'drivers.store']) !!}
						@include('admin.driver.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection