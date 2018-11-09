@extends('layouts.app')
@section('extends')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

@endsection
@section('content')
	<div class="container">
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<!--Div that will hold the pie chart-->
    				{!! $chart->container() !!}
    				{!! $chart->script() !!}
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
