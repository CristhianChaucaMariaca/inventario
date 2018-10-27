<div class="form-group">
	{{ Form::label('plaque', 'Ingrese placa') }}
	{{ Form::text('plaque', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'plaque']) }}
</div>
<div class="form-group">
	{{ Form::label('capacity', 'Ingrese capacidad de carga') }}
	{{ Form::text('capacity', null, ['class'=>'form-control', 'placeholder'=>'Nomenclatura', 'id'=>'capacity']) }}
</div>
<div class="form-group">
	{{ Form::label('color', 'Ingrese color') }}
	{{ Form::text('color', null, ['class'=>'form-control', 'placeholder'=>'Nomenclatura', 'id'=>'color']) }}
</div>
<div class="form-group">
	{{ Form::label('brand', 'Ingrese marca') }}
	{{ Form::text('brand', null, ['class'=>'form-control', 'placeholder'=>'Nomenclatura', 'id'=>'brand']) }}
</div>
<div class="form-group">
	{{ Form::label('model', 'Ingrese modelo') }}
	{{ Form::text('model', null, ['class'=>'form-control', 'placeholder'=>'Nomenclatura', 'id'=>'model']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
