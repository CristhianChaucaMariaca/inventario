@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Editar Exportacion</h3>
				</div>
				<div class="panel-body">
					{!! Form::model($sale,['route'=>['sales.update',$sale->id],'method'=>'PUT']) !!}
						@include('admin.sale.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection