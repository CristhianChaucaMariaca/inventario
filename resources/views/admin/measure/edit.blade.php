@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Editar medida de producto
				</div>
				<div class="panel-body">
					{!! Form::model($measure,['route'=>['measures.update',$measure->id],'method'=>'PUT']) !!}
						@include('admin.measure.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection