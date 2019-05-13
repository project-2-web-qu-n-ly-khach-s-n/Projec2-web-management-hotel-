@extends('layouts.app')
@section('content')
	@include('layouts.backgroundcrop')
	<div class="section background-grey-2 over-hide">
		<div class="container">
	        <div class="row">	        	
               	<ul class="tab_pill mt-5 pr-1 background-white">
                  <li class="active"><a class="pill" href="#profile" data-toggle="pill">Profile</a></li>
                  <li><a  class="pill" href="#change_password" data-toggle="pill">Change Password</a></li>
                  <li><a class="pill" href="#my_booking" data-toggle="pill">My Bookings</a></li>	                  
                </ul>           
	            <div class="col-7 mt-5 background-white">
	                
	                <div class="tab-content pr-5">	                	
	                        <div class="tab-pane active" id="profile">
	                            <div class="input-field"> 
	                                <label for="name">{{ __('Full name:')}}</label>
	                                <input id="acc_name" name="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }} color-black" if() value="{{ Auth::user()->name }}" required>
	                            </div>
	                            <div class="input-field">
	                                <label for="email">{{__('Email:')}}</label>
	                                <input id="acc_email" name="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} color-black" name="email" value="{{ Auth::user()->email }}" disabled>

                                @if ($errors->has('email'))
                                    <div class="alert-error text-center mt-4">
                                        <strong>*{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
	                            </div>
	                            <div class="input-field">
	                            	<label for="phone_number">{{ __('Phone number:')}}</label>
	                                <input id="acc_phone_number" name="phone_number" type="text" class="color-black" value="{{$acc_info[0]->phone_number}}" required>   
	                            </div>	                            
	                            <div class="input-field">
	                                <label for="address">Address:</label>
	                                <input id="acc_address" name="address" type="text" class="color-black" value="{{$acc_info[0]->address}}" required>
	                            </div>	                            
	                            <div class="input-field">
	                                <label for="password" >{{ __('Current password:') }}</label>
	                                <input id="acc_password" type="password" class="color-black" name="password" required>                           
	                            </div>	 
                            	<div class="flag_success text-center mb-4 p-2 color-black" id="flag_success-changeinfo" style="display: none;"></div>
                            	<div class="flag_failed text-center mb-4 p-2 color-black" id="flag_failed-changeinfo" style="display: none;"></div>
	                            
	                            <div class="button-div text-center col-6  col-sm-4 col-lg-12">    
	                                <button class="change_info-btn input-button mb-5">
	                                    {{ __('Submit') }}
	                                </button>                                
	                            </div>
	                        </div>
	                  
	                        <div class="tab-pane" id="change_password">
	                        	
	                            <div class="input-field">
	                                <label for="password" >{{ __('Current password:') }}</label>
	                                <input id="current-password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} color-black" name="password" required>

	                                @if ($errors->has('password'))
	                                    <div class="alert-error text-center mt-4">
	                                        <strong>*{{ $errors->first('password') }}</strong>
	                                    </div>
	                                @endif                              
	                            </div>
	                            <div class="input-field">
	                                <label for="password" >{{ __('New password:') }}</label>
	                                <input id="new-password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} color-black" name="password" required>

	                                <p style="color:red; display: none" class="error errorNpass"></p>                           
	                            </div>
	                            <div class="input-field">
	                                <label for="password-confirm">{{ __('Confirm Password:') }}</label>
	                                <input id="password-confirm" type="password"  name="password_confirmation" class="color-black" required>
	                                <p style="color:red; display: none" class="error errorCnpass"></p>
	                            </div>

	                            <div class="flag_success text-center mb-4 p-2 color-black" id="flag_success-changepass" style="display: none;"></div>
                            	<div class="flag_failed text-center mb-4 p-2 color-black" id="flag_failed-changepass" style="display: none;"></div>
	                          
	                            <div class="button-div text-center col-6  col-sm-4 col-lg-12">    
	                                <button class="change_pass-btn input-button mb-5">
	                                    {{ __('Submit') }}
	                                </button>                                
	                            </div>
	                        </div>
	                        <div class="tab-pane" id="my_booking">
		                        <table class="table table-hover tb-mybooking">
		                        	<thead>
		                        		<tr>
		                        			<th>No.</th>	
		                        			<th>Date in</th>
		                        			<th>Date out</th>
		                        			<th>Status</th>
		                        			<th></th>
		                        		</tr>
		                        	</thead>
		                        	<tbody>
		                        		@foreach($booking_info as $i=>$b_i)
		                        		<tr>
		                        			<td>{{$i+1}}</td>	
		                        			<td>{{date('d-m-Y', strtotime($b_i->date_in))}}</td>
		                        			<td>{{date('d-m-Y', strtotime($b_i->date_out))}}</td>
		                        			
	                        				@if($b_i->status == 0)
	                        					<td><span class="stt-p p-2">Pending</span></td>
	                        					<td class="p-1"><a onclick="return confirm('Are you sure?')" href="{{route('cancel-res',$b_i->id)}}" class="bttn btn-invert pb-2 pt-2 pl-1 pr-1 cancel-res">Cancel</a></td>
	                        				@elseif($b_i->status ==2)
	                        					<td><span class="stt-c p-2">Cancel</span></td>
	                        					<td></td>
	                        				@else
	                        					<td><span class="stt-d p-2">Done</span></td>
	                        					<td></td>
	                        				@endif
		                        		</tr>
		                        		@endforeach
		                        	</tbody>
		                        </table>
	                        </div>		                        
	                </div>
	            </div>	            
	        </div>
	    </div>
	</div>

<script type="text/javascript">
$(document).ready(function() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$(".change_info-btn").click(function(){
		$.ajax({
			url:"{{route('myaccount')}}",
			method:'POST',
			data:{_token:CSRF_TOKEN,
				name:$('#acc_name').val(),
				phone_number:$('#acc_phone_number').val(),
				address:$('#acc_address').val(),
				password:$('#acc_password').val()
			},
			dataType: 'json',
			success:function(data)
			{
				if(data.status == "success"){
					$("#flag_success-changeinfo").show().html(data.msg);
					$("#flag_failed-changeinfo").hide();
					$("#acc_password").val('');
				}else{
					$("#flag_failed-changeinfo").show().html(data.msg);
					$("#flag_success-changeinfo").hide();
					$("#acc_password").val('');
				}
				
			}
		});
	});

	$(".change_pass-btn").click(function(){
		$.ajax({
			url:"{{route('change-password')}}",
			method:'POST',
			data:{_token:CSRF_TOKEN,
				cpass:$('#current-password').val(),
				npass:$('#new-password').val(),
				cnpass:$('#password-confirm').val(),
			},
			dataType: 'json',
			success:function(data)
			{
				if(data.error == true){
					if (data.msg.npass != undefined) {
						$('.errorNpass').show().text(data.msg.npass[0]);
					}else if(data.msg.npass == undefined){
						$('.errorNpass').hide();
					}

					if(data.msg.cnpass != undefined){
						$('.errorCnpass').show().text(data.msg.cnpass[0]);
					}else if(data.msg.cnpass == undefined){
						$('.errorCnpass').hide();
					}

					if (data.msg.errorlogin != undefined) {
						$("#flag_failed-changepass").show().html(data.msg.errorlogin[0]);
						$("#flag_success-changepass").hide();
						$('#current-password').val('');
						$('#new-password').val('');
						$('#password-confirm').val('');
					}
					
				}else{
					$("#flag_success-changepass").show().html(data.msg);
					$("#flag_failed-changepass").hide();
					$('#current-password').val('');
					$('#new-password').val('');
					$('#password-confirm').val('');
				}
				
			}
		});
	});

	 function clicked() {
       if (confirm('Do you want to submit?')) {
           yourformelement.submit();
       } else {
           return false;
       }
    }
});
</script>
@endsection