<div class="form-group">
	{{ Form::label('type_id', 'Seleciones el tipo de producto') }}
	@if($types->count())
		{{ Form::select('type_id', $types, null, ['class'=>'form-control']) }}
	@else
		{{ Form::select('type_id', $types, null, ['class'=>'form-control','disabled']) }}
		<span class="text-danger"> Para usar este campo debe iniciar un producto</span>
	@endif
</div>
<div class="form-group">
	{{ Form::label('name', 'Ingrese nombre') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'name']) }}
</div>
<div class="form-group">
	{{ Form::label('min', 'Cantidad minima en stock') }}
	{{ Form::number('min', null, ['class'=>'form-control', 'placeholder'=>'minimo', 'id'=>'min']) }}
</div>
<div class="form-group">
	{{ Form::label('status', 'Estado') }}
	<label>{{ Form::radio('status', 'PUBLIC',true) }} Publico</label>
	<label>{{ Form::radio('status', 'PRIVATE') }} Privado</label>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
