<!-- Navbar
		================================================= -->

   <nav id="menu-wrap" class="menu-back cbp-af-header">
		<div class="menu-top background-black">
			<div class="container">
				<div class="row">
					<div class="col-4 px-0 px-md-3 pl-1 py-3">
						<span class="call-top">call us:</span> 
						<a href="#" class="call-top">(+84) 888 888 888</a>
					</div>	
					<div class="col-8 text-right">
						@guest
						<div class="px-0 px-md-3 pl-1 py-3">
							<a href="{{route('login')}}" class="account-top">log in</a>
							<a href="{{route('register')}}" class="account-top">register</a>
							<a href="{{route('guestbooking')}}" class="account-top">My bookings</a>
						</div>
						@else	
                            <div class="account-wrap">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong>{{ Auth::user()->name }}</strong>  <span class="caret"></span>
                                </a>
								<ul>
									<li><a href="{{route('myaccount')}}"><i class="fas fa-user"></i>My Account</a></li>
									<li><a href="{{route('myaccount',['#my_booking'])}}"><i class="fas fa-ticket-alt"></i>My Booking</a></li>
									<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></a></li>	
								</ul>
							</div>
                            
						@endguest		
					</div>				
				</div>	
			</div>		
		</div>
		<div class="menu">			
			<ul>
				<li><a class="curent-page" href="{{route('home')}}" >home</a></li>
				<li><a href="{{route('rooms')}}" >rooms</a></li>
				<li><a href="">gallery</a></li>				
				<li><a href="">Service</a></li>
				<li><a href="">contact</a></li>
				<li><a href="{{route('about')}}">about us</a></li>
				<li><a href="{{route('booking')}}"><span>book now</span></a></li>
			</ul>
		</div>
	</nav>