<div class="form-group">
	{{ Form::label('name', 'Ingrese nombre') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'name']) }}
</div>
<div class="form-group">
	{{ Form::label('address', 'Direccion') }}
	{{ Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'Address']) }}
</div>
<div class="form-group">
	{{ Form::label('phone', 'Numero de telefono') }}
	{{ Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Telenofo', 'id'=>'phone']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
