<div class="form-group">
	{{ Form::label('name', 'Ingrese nombre') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'name']) }}
</div>
<div class="form-group">
	{{ Form::label('measure_id','Seleccione la unidad de medida') }}
	@if($measures->count())
		{{ Form::select('measure_id', $measures, null,['class'=>'form-control']) }}
	@else
		{{ Form::select('measure_id', $measures, null,['class'=>'form-control', 'disabled']) }}
		<span class="text-danger">Para usar este campo debe registrar medidas</span>
	@endif
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
