@extends('layouts.app')
@section('content')
		
	@include('layouts.backgroundcrop')
	
	<!-- Rooms
		================================= -->
	<div class="section padding-top-bottom over-hide background-grey">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 align-self-center">
					<h1 class="text-center padding-bottom-small">Our rooms</h1>
				</div>
				@foreach($room as $r)
				<div class="col-md-6 mb-5">
					<div class="card">
						<div class="room-per">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="room-img">
							<img class="card-img-top" src="img/{{$r->image}}" alt="{{$r->name}}">
						</div>						
						<div class="card-body">
							<h5 class="card-title">{{$r->name}}</h5>
							<p class="card-text">{{$r->description}}</p>
							<a href="#" class="col-4 bttn btn-primary">book now</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>	
		</div>		
	</div>
@endsection