<div class="form-group">
	{{ Form::label('name', 'Ingrese nombre') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'name']) }}
</div>
<div class="form-group">
	{{ Form::label('no', 'Ingrese nomenclatura') }}
	{{ Form::text('no', null, ['class'=>'form-control', 'placeholder'=>'Nomenclatura', 'id'=>'no']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
