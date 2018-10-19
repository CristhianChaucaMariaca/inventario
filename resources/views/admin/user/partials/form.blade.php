<div class="form-group">
	{{ Form::label('name', 'Ingrese nombre') }}
	{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'name']) }}
</div>
<div class="form-group">
	{{ Form::label('email', 'Ingrese el correo') }}
	{{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'email']) }}
</div>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
			<li>
				<label>
					{{ Form::checkbox('roles[]', $role->id, null) }}
					{{ $role->name }}
					<em> ( {{ $role->description ?: 'N/A' }} ) </em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
