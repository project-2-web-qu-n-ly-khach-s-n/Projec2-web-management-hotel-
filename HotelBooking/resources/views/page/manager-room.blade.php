@extends('layouts.admin-app')
@section('content')
	<style type="text/css">
		.main{

		}
		.box-room{
			width: 70px;
			height: 70px;
			display: inline-block;
			vertical-align: middle;
			font-size: 20px;
			text-align: center;
			line-height: 65px;
		}
		.type-1{
			border:2px solid #f71708;
		}
		.type-2{
			border:2px solid #e5be00;
		}
		.type-3{
			border:2px solid #0ace10;
		}
		.type-4{
			border:2px solid #0a10ca;
		}
		.used{
			border: 2px solid #414141;
   			background: #4e4e4e;
   			color: #fff;
		}
	</style>
	<div class="container main">
		@for($i=0; $i<sizeof($room);$i+=10)
			<div class="row">
				@for($j=$i; $j<$i+10; $j++)
					@if($room[$j]->status == 0)
						@if($room[$j]->id_type == 1)
							<div class="box-room col-1 type-1 m-1"> {{$room[$j]->id}}</div>
						
						@elseif($room[$j]->id_type == 2)
							<div class="box-room col-1 type-2 m-1"> {{$room[$j]->id}}</div>
						
						@elseif($room[$j]->id_type == 3)
							<div class="box-room col-1 type-3 m-1"> {{$room[$j]->id}}</div>
						
						@elseif($room[$j]->id_type == 4)
							<div class="box-room col-1 type-4 m-1"> {{$room[$j]->id}}</div>
						@endif
					@else
						<div class="box-room col-1 used m-1"> {{$room[$j]->id}}</div>
					@endif
				@endfor
			</div>
		@endfor
		
	</div>
@endsection