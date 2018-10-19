@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $product->name }}</h3>
				</div>
				<div class="panel-body">
					<p><strong>Typo de producto: </strong>{{ $product->type->name }}</p>
					<p><strong>Unidad de Medida: </strong> {{ $product->unidad }}</p>
					<p><strong>Stock minimo: </strong>{{ $product->min }}</p>
					<p><strong>Estado: </strong>
						@if($product->status == 'PUBLIC')
							<td>
								<span>Publico</span>
							</td>
								@elseif($product->status == 'PRIVATE')
							<td>
								<span>privado</span>
							</td>
						@endif
					</p>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection