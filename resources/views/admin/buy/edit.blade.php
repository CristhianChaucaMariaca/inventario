@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Crear un Tipo de producto
				</div>
				<div class="panel-body">
					{!! Form::model($buy,['route'=>['buys.update',$buy->id],'method'=>'PUT']) !!}
						@include('admin.buy.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection