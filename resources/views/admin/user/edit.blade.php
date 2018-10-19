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
					{!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'PUT']) !!}
						@include('admin.user.partials.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection