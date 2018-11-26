{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
	{{ Form::label('product_id', 'Seleciones el de producto') }}
	@if($products->count())
		{{ Form::select('product_id', $products, null, ['class'=>'form-control']) }}
	@else
		{{ Form::select('product_id', $products, null, ['class'=>'form-control','disabled']) }}
		<span class="text-danger">Debe iniciar un producto para utilizar este campo</span>
	@endif
</div>
<div class="form-group">
	{{ Form::label('driver_id', 'Selecione su conductor') }}
	@if($drivers->count())
		{{ Form::select('driver_id', $drivers, null, ['class'=>'form-control']) }}
	@else
		{{ Form::select('driver_id', $drivers, null, ['class'=>'form-control','disabled']) }}
		<span class="text-danger">Debe iniciar un conductor para usar el campo</span>
	@endif
</div>
<div class="form-group">
	{{ Form::label('vehicle_id', 'Selecione su vehiculo') }}
	@if($vehicles->count())
		{{ Form::select('vehicle_id', $vehicles, null, ['class'=>'form-control']) }}
	@else
		{{ Form::select('vehicle_id', $vehicles, null, ['class'=>'form-control','disabled']) }}
		<span class="text-danger">Debe iniciar un vehiculo para usar este campo</span>
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
	{{ Form::label('codex', 'Codigo de exportación') }}
	{{ Form::text('codex', null, ['class'=>'form-control', 'placeholder'=>'Codigo de exportación', 'id'=>'codex']) }}
</div>

	<div class="form-group">
		{{ Form::label('status', 'Estado') }}
		@if(request()->is('sales/*/edit') && $sale->status=='FINISHED')
			<label>{{ Form::radio('status', 'PENDING',null,['disabled']) }} Pendiente</label>
		@else
			<label>{{ Form::radio('status', 'PENDING') }} Pendiente</label>
		@endif
		<label>{{ Form::radio('status', 'FINISHED',true)}} Finalizado</label>
	</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>
