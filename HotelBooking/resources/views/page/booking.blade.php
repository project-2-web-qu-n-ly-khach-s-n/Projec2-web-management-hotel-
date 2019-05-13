<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation</title>   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/plugins.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--Jquery-->   
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <!-- Ioncion -->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">		
		body{
			background-color: rgba(0,0,0,.9);
		}
		.HearderButton{
			display: flex;
			background-color: #ed254e;
			border:1px solid black;
			height: 70px;
			text-align: center;
			padding: 0;
			color: #fff;
			padding-top:5px;
			width: 100%;

		}		
		.HearderButton:hover{
			text-decoration: none;
			background-color: #c22747;
			color: #fff;
		}
		.tab-pane{
			text-align: center;
		}
		.active-tab{
			background-color: #ed254ebf;
		}

		/*Room & guest*/

		#add-room{
			color:#ed254e;
		}

		#add-room:hover{
			text-decoration: none;
			color: #fcfcfc;
		}

		/*Date of stay*/
		.disabled-btn{			

			border: solid 1px #868686;
			pointer-events: none;
		}

		/*Accoumodations*/
		.dropdown:hover>.dropdown-menu {
		  display: block;
		}

		.dropdown>.dropdown-toggle:active {
		  Without this, clicking will make it sticky
		    pointer-events: none;
		}
		.room-img-cart{
			position: relative;
		    width: 100px;
		    height: 70px;
		    box-sizing: border-box;
		    overflow: hidden;
		    cursor: pointer;
		}
		.room-cart{
			border: 0;
			background-color: #5a5755;
			border-radius: 0;
		}

		.card-horizontal {
		    display: flex;
		    flex: 1 1 auto;
		}
		.card-body{
			display: flex;
		}

		
		.price-sel{
			display: flex;
			position: absolute;
			bottom: 0;
			width: 80%;
    		right: 0;
		}
		.price-sel input{
			width: 100%;
		    border: 0;
		    color: #ffff;
		    background-color: #2c2c2ca1;
		    text-align: center;
		    flex-grow: 2;		    
		    user-select: none;
		    outline: none;
		    cursor: pointer;
		}
		.price-sel a{
			flex-grow: 1;
		}

		/*Total*/

		.payment{
			display: flex;
			color:#fff;
		}
		.customer_info{
			border-right: 1px dotted #ed254e;
			border-left: 1px dotted #ed254e;
		}
		.total-amount{
			border-top:1px dotted #ed254e;

		}
		.total-amount table, .detail table{
			width: 100%;
		}

		.form-check:checked{
			background-color: red;
		}

		/*fake loading*/

		.lds-ring {
			display:none;
			position: fixed;
			width: 100%;
			height: 100vh;
			background-color: #000000db;
			z-index: 10000;
		}
		.lds-ring div {
			box-sizing: border-box;
			display: block;
			position: fixed;
			width: 100px;
			height: 100px;
			left: 45%;
			top: 40%;
			margin: 6px;
			border: 6px solid #fff;
			border-radius: 50%;
			animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
			border-color: #fff transparent transparent transparent;
		}
		.lds-ring div:nth-child(1) {
		  animation-delay: -0.45s;
		}
		.lds-ring div:nth-child(2) {
		  animation-delay: -0.3s;
		}
		.lds-ring div:nth-child(3) {
		  animation-delay: -0.15s;
		}
		@keyframes lds-ring {
		  0% {
		    transform: rotate(0deg);
		  }
		  100% {
		    transform: rotate(360deg);
		  }
		}

	</style>	
	
</head>
<body>

	
	<div class="lds-ring" id="lds-ring"><div></div><div></div><div></div><div></div></div>
	<div class="fluid-container">
		
		<div class="nav nav-tabs border-bottom-0" id="tabMenu">
			<a class="HearderButton col-1 justify-content-center" href="{{route('home')}}" target="_blank" >Home</a>
			<a class="HearderButton col-3 justify-content-center active" data-toggle="tab" id="qty-header" href="#qty">Guest & room</a>
			<a class="HearderButton col-3 justify-content-center" id="date-pick-header" data-toggle="tab" href="#date-pick">Date of stay</a>			
			<div class="dropdown col-3 p-0">
			    <a class="HearderButton justify-content-center" id="room-pick-header" data-toggle="tab" href="#room-pick">Accomodations</a>		
				<div class="room-cart dropdown-menu col-12 p-0" aria-labelledby="dropdownMenuButton"></div>
			</div>	
			<a class="HearderButton col-2 justify-content-center" id="total-header" data-toggle="tab" href="#total">Total</a>
		</div>	

		

		<form method="POST" action="{{ route('booking') }}">
			 @csrf
			<div class="tab-content">
				{{-- qty
					======================================== --}}
				<div id="qty" class="tab-pane active">
					<h1 class="text-center mb-4 mt-4 color-white">Guest & room</h1>
					<div  id="container-add-room" >
						<div class="guest-room row justify-content-center">
							<div class="row col-12 col-lg-6 col-md-8 col-sm-10 mt-5 justify-content-center">
								<a href="#" class="sub-room" id="sub-room" style="visibility: hidden;"><ion-icon name="close" style="font-size: 40px; color:#fff;"></ion-icon></a>
								<div class="col-5">
									<select name="adults" class="wide">
										<option data-display="1 adults" value="1">1 adults</option>
										<option value="2">2 adults</option>
										<option value="3">3 adults</option>
									</select>
								</div>
								<div class="col-5">
									<select name="children" class="wide">
										<option data-display="Children">Children</option>
										<option value="1">1 children</option>
										<option value="2">2 children</option>
										<option value="3">3 children</option>
									</select>
								</div>								
							</div>
						</div>		
					</div>				
					<div class="mb-5 mt-4 text-center">
						<a href="#" id="add-room">Add a room</a>
					</div>		
					<div class="row justify-content-center">
						<div class="row text-center  ">
							<button class="update-btn input-button col-12 p-4" data-toggle="tab" href="#date-pick">{{ __('Update room & guest') }}</button>
						</div>						
					</div>
				</div>
				{{-- date-pick
					================================================= --}}
				<div id="date-pick" class="tab-pane">
					<h1 class="text-center mb-4 mt-4 color-white">Date picker</h1>
					<div class="row justify-content-center">
						<div class="col-5 mt-5">
							<div class="row mb-4">
								<div class="input-daterange input-group" id="flight-datepicker">
									<div class="row">	
										<div class="col-12 col-md-6 mb-4">
											<div class="form-item">
												<span class="fontawesome-calendar"></span>
												<input class="input-sm" type="text" autocomplete="off" id="start-date" name="start" placeholder="chech-in date" data-date-format="dd/mm/yyyy"/>
												<span class="date-text date-depart"></span>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="form-item">
												<span class="fontawesome-calendar"></span>
												<input class="input-sm" type="text" autocomplete="off" id="end-date" name="end" placeholder="check-out date" data-date-format="dd/mm/yyyy"/>
												<span class="date-text date-return"></span>
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="row mt-4">						
							<button class="update-btn input-button col-12 p-4" data-toggle="tab" id="update-date" href="#room-pick">{{ __('Update date of stay') }}</button>
						</div>
					</div>
				</div>
				{{-- room-pick 
					=============================================== --}}
				<div id="room-pick" class="tab-pane">
					<h1 class="text-center mb-4 mt-4 color-white">Rooms</h1>
					<div class="row flex-row flex-nowrap justify-content-center">
				        <div class="col-10">	
				        @foreach($room as $r)	
				        	<div class="card mb-4">
								<div class="row no-gutters">
									<div class="col-md-5 room-img">
										<img src="img/{{$r->image}}" class="card-img" alt="{{$r->name}}">
									</div>
									<div class="col-md-7">
										<div class="card-body">
											<div class="col-6">
												<h4 class="card-title">{{$r->name}}</h4>
												<p class="mt-3">{{$r->description}}</p>
											</div>
											<div class="col-6 text-md-left">
												<ul class="text-md-left">
													<li>Max: 4 Person(s)</li>
													<li>View: City</li>
													<li>Size: 35m2/ 376ft2</li>		
												</ul>             

												<div class="price-sel">		
													<input type="text" value="${{$r->price}}" />
													<button class="reserve-room input-button" id="{{$r->id}}" type="button">book</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>			            	
			            @endforeach				           
				        </div>
					</div>
				</div>
				{{-- total
					======================================= --}}
				<div id="total" class="tab-pane">
					<h1 class="text-center mb-4 mt-4 color-white">Total</h1>
					<div class="payment row">
						<div class="col-12 col-lg-4 pl-5 pr-5 mb-5 mt-5">
							<h5 class="text-center color-white">Your reservation</h5>
							<div class="detail mt-2 mb-3">
							</div>
							<div class="total-amount" >
								<table >
									<td class="text-left">
										<span>Total reservation amount</span>
									</td>
									<td class="text-right">
										<span id="total_amount"></span>
									</td>
								</table>
							</div>
						</div>
						<div class="customer_info col-12 col-lg-4 pl-5 pr-5 mb-5 mt-5">
							<h5 class="text-center color-white">Your infomation</h5>
							@guest
								<div class="input-field"> 
	                                <label for="name">{{ __('Full name:')}}</label>
	                                <input id="name" name="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }} color-white" value="" required>	                
	                            </div>
	                            <div class="input-field">
	                                <label for="email">{{__('Email:')}}</label>
	                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} color-white" name="email" value="" required>

	                                @if ($errors->has('email'))
	                                    <div class="alert-error text-center mt-4">
	                                        <strong>*{{ $errors->first('email') }}</strong>
	                                    </div>
	                                @endif
	                            </div>
	                            <div class="input-field">
                            	<label for="phone_number">{{ __('Phone number:')}}</label>
                                <input id="phone_number" type="text" class="color-white" name="phone_number" value="" required>   
                            </div>
                            @else
	                            <div class="input-field"> 
	                                <label for="name">{{ __('Full name:')}}</label>
	                                <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }} color-white" value="{{ Auth::user()->name }}" required>
	                                @if ($errors->has('name'))
	                                    <div class="alert-error text-center mt-4">
	                                        <strong>*{{ $errors->first('name') }}</strong>
	                                    </div>
                               		 @endif 
	                            </div>
	                            <div class="input-field">
	                                <label for="email">{{__('Email:')}}</label>
	                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} color-white" name="email" value="{{ Auth::user()->email }}" required>

	                                @if ($errors->has('email'))
	                                    <div class="alert-error text-center mt-4">
	                                        <strong>*{{ $errors->first('email') }}</strong>
	                                    </div>
	                                @endif
	                            </div>
	                            <div class="input-field">
	                            	<label for="phone_number">{{ __('Phone number:')}}</label>
	                                <input id="phone_number" type="text" class="color-white" value="{{$acc_info[0]->phone_number}}" required>   
	                            </div>
                            @endguest
                            	
						</div>
						<div class="col-12 col-lg-4 pl-5 pr-5 mt-5">
							<h5 class="text-center color-white">Payment Method</h5>
							<div class="input-field">
                            	<label for="name-on-card">{{ __('Name on Card:')}}</label>
                                <input id="name-on-card" type="text" class="color-white" required>   
                            </div>	
                            <div class="input-field">
                            	<label for="card_number">{{ __('Card number:')}}</label>
                                <input id="card_number" type="text" class="color-white" required>   
                            </div>	
                            <div class="input-field">
                            	<label for="expiration-date">{{ __('Expiration date:')}}</label>
                                <input id="expiration-date" type="text" class="color-white" placeholder="MM/YY" required>   
                            </div>	
							<div class="button-div text-center col-12">                                
	                            <button type="submit" class="input-button p-3">
	                                {{ __('Book now') }}
	                            </button>                                
	                        </div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<script type="text/javascript">		    
	$(document).ready(function() 
	{
		//fake loading
		$('.HearderButton').click(function(){
			document.getElementById('lds-ring').style.display="block";
			setTimeout(function unwait() 
			{
				document.getElementById('lds-ring').style.display="none";
			}, 400);
		});
		
		$('.update-btn').click(function(){
			document.getElementById('lds-ring').style.display="block";
			setTimeout(function unwait() 
			{
				document.getElementById('lds-ring').style.display="none";
			}, 400);
		});


		//active tab color
		 document.getElementById("qty-header").classList.add("active-tab");
		$(document).click(function(){
			var id = $('.tab-content .active').attr('id');
			if (id == "qty") {
		        document.getElementById("qty-header").classList.add("active-tab");
		        document.getElementById("date-pick-header").classList.remove("active-tab");
		        document.getElementById("room-pick-header").classList.remove("active-tab");
		        document.getElementById("total-header").classList.remove("active-tab");
		    }else if (id == "date-pick"){
		    	document.getElementById("date-pick-header").classList.add("active-tab");
		    	document.getElementById("qty-header").classList.remove("active-tab");
		    	document.getElementById("room-pick-header").classList.remove("active-tab");
		    	document.getElementById("total-header").classList.remove("active-tab");
		    }else if (id == "room-pick"){
		        document.getElementById("room-pick-header").classList.add("active-tab");
		        document.getElementById("qty-header").classList.remove("active-tab");
		        document.getElementById("date-pick-header").classList.remove("active-tab");
		        document.getElementById("total-header").classList.remove("active-tab");
		    }else if (id == "total"){
		    	document.getElementById("total-header").classList.add("active-tab");
		    	document.getElementById("qty-header").classList.remove("active-tab");
		    	document.getElementById("date-pick-header").classList.remove("active-tab");
		    	document.getElementById("room-pick-header").classList.remove("active-tab");
		    }
		});


		
		//sel-qty-room
		var i=0;
		var max_rooms=5;
		$("#qty-header").html("Guest & room <br>"+1+" room");
		$('#add-room').on('click', function() 
		{
			if(i<max_rooms) {
				document.getElementById("sub-room").style.visibility = "visible";
				var source = $('.guest-room:first'), clone = source.clone();
		    	clone.appendTo('#container-add-room');
		    	document.getElementById("sub-room").style.visibility = "visible";
		    	$("#qty-header").html("Guest & room <br>"+(i+2)+" rooms");
		    	i++;
			}
			if(i==max_rooms-1){
				document.getElementById("add-room").style.display = 'none'; 
			}						    
		});
		
		$(document).on("click",".sub-room",function() 
		{	
			if(i>0){
				$(this).closest(".guest-room").remove();
				i--;				
				document.getElementById("add-room").style.display = 'block';
				$("#qty-header").html("Guest & room <br>"+(i+1)+" rooms");				
			}
			if(i<1){
				document.getElementById("sub-room").style.visibility = "hidden";
				$("#qty-header").html("Guest & room <br>"+1+" room");
			}
		});	

		//check date picked

		if($(".date-text").text().length==0){
			document.getElementById("update-date").classList.add("disabled-btn");
			$("#update-date").prop('disabled', true);
		};
		$('#start-date').on('change', function() {
			if($("#start-date").val()==''){				
				$("#end-date").prop('disabled', true);						
			}else{
				$("#end-date").prop('disabled', false);					
			}
			
		});
		$('#end-date').on('change', function() {
			if($("#end-date").val()==''){				
				$("#update-date").prop('disabled', true);		
				$("#room-pick-header").prop('disabled', true);	
				$("#total-header").prop('disabled', true);
				document.getElementById("update-date").classList.add("disabled-btn");
				document.getElementById("room-pick-header").classList.add("disabled-btn");
				document.getElementById("total-header").classList.add("disabled-btn");
			}else{
				$("#update-date").prop('disabled', false);
				$("#room-pick-header").prop('disabled', false);	
				$("#total-header").prop('disabled', false);
				document.getElementById("update-date").classList.remove("disabled-btn");
				document.getElementById("room-pick-header").classList.remove("disabled-btn");
				document.getElementById("total-header").classList.remove("disabled-btn");
				$('.room-cart').html('');
				$('.detail').html('');
				j=0;
				$("#room-pick-header").html("Accomodations");	
			}
			
		});
		
		function toDate(dateStr) {
		  var parts = dateStr.split(".")
		  return new Date(parts[2], parts[1] - 1, parts[0])
		}

		function calDate(){
			var start=toDate($('#start-date').val());
			var end=toDate($('#end-date').val());
			var day = (end-start)/1000/60/60/24;
			if(day==0) day=1;
			return day;
		}


		//redirect to specific tab
		$('#tabMenu a[href="#{{ old('tab') }}"]').tab('show');	


		//add room
		var j=0;
		var total_amount=0;
		$('.reserve-room').click(function()
		{	

			document.getElementById('lds-ring').style.display="block";
			setTimeout(function unwait() 
			{
				document.getElementById('lds-ring').style.display="none";
			}, 200);
			if(j<i+1)
			{
				var id =this.id;
				var rid = j+1;
				$.ajax({
					url:"{{route('add_room.action')}}",
					method:'GET',
					data:{id:id, 
						roomIDp:rid,
						calDate:calDate()},
					dataType: 'json',
					success:function(data)
					{
						$('.room-cart').append(data.room);
						$('.detail').append(data.detail);
						total_amount+=data.room_price;
						$('#total_amount').html('$'+total_amount);
					}
				});		
				if(i==j){
					$('.nav-tabs a[href="#total"]').tab('show');
				}
				j++;			
				$("#room-pick-header").html("Accomodations <br>"+(j)+" rooms");	
			}else{
				$('.nav-tabs a[href="#total"]').tab('show');
			}		
		});


		$(document).on("click",".remove-room",function() 
		{	
			var id_room=this.id;
			$(this).closest(".card").remove();			
			j--;
			document.getElementById(id_room).remove();
			$('.nav-tabs a[href="#room-pick"]').tab('show');
			$("#room-pick-header").html("Accomodations <br>"+(j)+" rooms");
			var idr=this.id.substring(this.id.length - 1, this.id.length);
			$.ajax({
				url:"{{route('remove_room.action')}}",
				method:'GET',
				data:{id:idr,
					calDate:calDate()},
				dataType: 'json',
				success:function(data)
				{						
					total_amount-=data.room_price;
					$('#total_amount').html('$'+total_amount);
				}
			});
		});
	});
</script>
</body>
</html>
