{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
	{{ Form::label('product_id', 'Seleciones el de producto') }}
	{{ Form::select('product_id', $products, null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('provider_id', 'Selecione su proveedor') }}
	{{ Form::select('provider_id', $providers, null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('cuantity', 'Ingrese cantidad') }}
	{{ Form::number('cuantity', null, ['class'=>'form-control', 'placeholder'=>'Cantidad', 'id'=>'cuantity']) }}
</div>
<div class="form-group">
	{{ Form::label('unitary', 'Costo unitario') }}
	{{ Form::number('unitary', null, ['class'=>'form-control', 'placeholder'=>'Unitario', 'id'=>'unitary']) }}
</div>
<div class="form-group">
	{{ Form::label('status', 'Estado') }}
	<label>{{ Form::radio('status', 'PENDING') }} Pendiente</label>
	<label>{{ Form::radio('status', 'FINISHED') }} Finalizado</label>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
