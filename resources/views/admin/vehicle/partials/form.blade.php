<div class="form-group">
	{{ Form::label('plaque', 'Ingrese placa') }}
	{{ Form::text('plaque', null, ['class'=>'form-control', 'placeholder'=>'Placa de vehiculo', 'id'=>'plaque']) }}
</div>
<div class="form-group">
	{{ Form::label('capacity', 'Ingrese capacidad de carga') }}
	{{ Form::text('capacity', null, ['class'=>'form-control', 'placeholder'=>'Capacidad de vehiculo', 'id'=>'capacity']) }}
</div>
<div class="form-group">
	{{ Form::label('color', 'Ingrese color') }}
	{{ Form::text('color', null, ['class'=>'form-control', 'placeholder'=>'Color del vehiculo', 'id'=>'color']) }}
</div>
<div class="form-group">
	{{ Form::label('brand', 'Ingrese marca') }}
	{{ Form::text('brand', null, ['class'=>'form-control', 'placeholder'=>'Marca del vehiculo', 'id'=>'brand']) }}
</div>
<div class="form-group">
	{{ Form::label('model', 'Ingrese modelo') }}
	{{ Form::text('model', null, ['class'=>'form-control', 'placeholder'=>'Modelo del vehiculo', 'id'=>'model']) }}
</div>

<div class="form-group">
	{{ Form::label('status', 'Estado del vehiculo') }}
	<label>{{ Form::radio('status','FREE',true) }} LIBRE</label>
	<label>{{ Form::radio('status','OCCUPIED') }} OCUPADO</label>
	<label>{{ Form::radio('status','OUT') }} FUERA DE SERVICIO</label>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
