<div class="preloader fixed-top">
	<section class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="contact-number">
						<i class="tf-ion-ios-telephone"></i>
						<span>Selasa, 3 Januari 2021</span>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<!-- Site Logo -->
					<div class="logo text-center">
						<a href="index.html">
							<!-- replace logo here -->
							<img src="{{ asset('image/petani.png') }}" alt="" style="max-width: 30%">
						</a>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4" style="text-align: right;">
					@if ($s_id == "")
						<a href="/reg" class="btn btn-small" style="background-color: white;color: black;">Register</a>
						<a href="/log" class="btn btn-small">Login</a>						
					@else
						<a href="/out" class="btn btn-small">Logout</a>	
					@endif
					<!-- Cart -->
				</div>
			</div>
		</div>
	</section><!-- End Top Header Bar -->
	
	
	<!-- Main Menu Section -->
	<section class="menu">
		<nav class="navbar navigation">
			<div class="container">
				<div class="navbar-header">
					<h2 class="menu-title">Menu</h2>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
						aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
	
				</div><!-- / .navbar-header -->
	
				<!-- Navbar Links -->
				<div id="navbar" class="navbar-collapse collapse text-center">
					<ul class="nav navbar-nav">
	
						<!-- Beranda -->
						<li class="dropdown ">
							<a href="/">Beranda</a>
						</li>
	
	
						<!-- Profile -->
						<li class="dropdown ">
							<a href="/berita">Berita</a>
						</li>
	
	
						<!-- Palayanan -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
								role="button" aria-haspopup="true" aria-expanded="false">Produk <span
									class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu">
								@foreach ($katagoris as $katagoris)
									<li><a href="/produk/{{$katagoris->id_kata}}">{{$katagoris->katagori}}</a></li>
								@endforeach
							</ul>
						</li>
					</ul><!-- / .nav .navbar-nav -->
	
				</div>
				<!--/.navbar-collapse -->
			</div><!-- / .container -->
		</nav>
	</section>
</div>
