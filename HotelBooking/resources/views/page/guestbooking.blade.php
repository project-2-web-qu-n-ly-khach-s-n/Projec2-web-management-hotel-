@extends('layouts.app')
@section('content')
<!-- Primary Page Layout
	================================================== -->
		<div class="section background-black over-hide">
			<div class="form-center-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12 col-xl-6 col-lg-8 col-md-10">	
							<div class="input-form">
								<h1 class="text-center mb-4">Search for your reservation</h1>
								<div class="input-field">
									<input type="text" id="reservation-number"  class="color-white" required>
									<label for="reservation-number:">Reservation number: *</label>
								</div>

								<div class="input-field">
									<input type="text" id="Surname-linked" class="color-white" required>
									<label for="Surname-linked">Surname linked to the reservation: *</label>
								</div>

								<div class="col-12 mb-5">
									<div class="input-daterange input-group" id="flight-datepicker" style="border: 0.5px solid #ed254e;">
										<div class="row">	
											<div class="col-12">
												<div class="form-item">
													<span class="fontawesome-calendar"></span>
													<input class="input-sm" type="text" autocomplete="off" id="start-date-1" name="start" placeholder="chech-in date" data-date-format="DD, MM d"/>
													<span class="date-text date-depart"></span>
												</div>
											</div>
										</div>
									</div>
								</div>

									
								<div class="text-center col-12 mb-4">
									<a class="input-button pt-2 pb-2 pl-5 pr-5" href="">Search</a>
								</div>
								
							</div>

							<div class="input-form mt-4">
																	
								<div class="text-center col-12">
									ALREADY HAVE AN ACCOUNT ? 
									<a class="input-button ml-4 p-2" href="{{route
										('login')}}">Sign in</a>
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>
			@include('layouts.background');
		</div>
@endsection