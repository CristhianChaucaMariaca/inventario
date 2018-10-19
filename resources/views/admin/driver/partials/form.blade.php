{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
	{{ Form::label('name', 'Ingrese nombre') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'name']) }}
</div>
<div class="form-group">
	{{ Form::label('last_name', 'Ingrese Apellido') }}
	{{ Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Apellidos', 'id'=>'last_name']) }}
</div>
<div class="form-group">
	{{ Form::label('phone', 'Telefono') }}
	{{ Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Telefono', 'id'=>'phoner']) }}
</div>
<div class="form-group">
	{{ Form::label('address', 'Direccion actual') }}
	{{ Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'address']) }}
</div>
<div class="form-group">
	{{ Form::label('ci', 'Cedula de identidad') }}
	{{ Form::number('ci', null, ['class'=>'form-control', 'placeholder'=>'Cedula', 'id'=>'ci']) }}
</div>
<div class="form-group">
	{{ Form::label('license', 'Licencia de conducir') }}
	{{ Form::number('license', null, ['class'=>'form-control', 'placeholder'=>'Licencia', 'id'=>'license']) }}
</div>
<div class="form-group">
	{{ Form::label('status', 'Estado del conductor') }}
	<label>{{ Form::radio('status','FREE') }} LIBRE</label>
	<label>{{ Form::radio('status','OCCUPIED') }} OCUPADO</label>
	<label>{{ Form::radio('status','OUT') }} FUERA DE SERVICIO</label>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
