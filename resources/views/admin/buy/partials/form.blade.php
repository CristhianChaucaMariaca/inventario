{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
	{{ Form::label('product_id', 'Seleciones el producto') }}
	@if($products->count())
		{{ Form::select('product_id', $products, null, ['class'=>'form-control']) }}
	@else
		{{ Form::select('product_id', $products, null, ['class'=>'form-control','disabled']) }}
		<span class="text-danger">Debe iniciar un producto para usar este campo</span>
	@endif
</div>
<div class="form-group">
	{{ Form::label('provider_id', 'Selecione su proveedor') }}
	@if($providers->count())
		{{ Form::select('provider_id', $providers, null, ['class'=>'form-control']) }}
	@else
		{{ Form::select('provider_id', $providers, null, ['class'=>'form-control','disabled']) }}
		<span class="text-danger">Debe iniciar un proveedor para usar este campo</span>
	@endif
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
	@if(request()->is('buys/*/edit') && $buy->status=='FINISHED')
		<label>{{ Form::radio('status', 'PENDING',null,['disabled']) }} Pendiente</label>
	@else
		<label>{{ Form::radio('status', 'PENDING') }} Pendiente</label>
	@endif
	<label>{{ Form::radio('status', 'FINISHED',true) }} Finalizado</label>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
