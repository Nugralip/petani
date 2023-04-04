{{-- caroasel --}}
<div class="row mb-20">
	<div class="col-md-12">
		<div class="single-product-slider">
			<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
				<div class='carousel-outer'>
					<!-- me art lab slider -->
					<div class='carousel-inner '>
						<div class='item active'>
							<img style="width: 100%" src='{{ asset('image/petani1.png')}}' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
						</div>
						<div class='item'>
							<img style="width: 100%" src='{{ asset('image/petani2.png')}}' alt='' data-zoom-image="images/shop/single-products/product-2.jpg" />
						</div>
						
						<div class='item'>
							<img style="width: 100%" src='{{ asset('image/petani3.png')}}' alt='' data-zoom-image="images/shop/single-products/product-3.jpg" />
						</div>
						
					</div>
					
					<!-- sag sol -->
					<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
						<i class="tf-ion-ios-arrow-left"></i>
					</a>
					<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
						<i class="tf-ion-ios-arrow-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Berita Dan Lainnya --}}
<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-30">
				<div class="title-left">
					<h2>Berita Dan Updates</h2>
						
				</div>				
			</div>
		</div>
		<div class="row">
			@foreach ($beritas as $beritas)
			<div class="col-md-4">
				<div class="post">
					<div class="post-thumb">
					<a href="berita/{{$beritas->id_berita}}">
						<img class="img-responsive" src="{{  asset('image/berita/'.$beritas->picture)}}" alt="">
					</a>
					</div>
					<h2 class="post-title txt-oev-2"><a href="berita/{{$beritas->id_berita}}"">{{$beritas->title}}</a></h2>
					<div class="post-meta">
					<ul>
						<li>
						<i class="tf-ion-ios-calendar"></i> {{$beritas->created_at}}
						</li>
					</ul>
					</div>
					<div class="post-content">
					<p class="txt-oev-3"> {{$beritas->isi}} </p>
					<a href="berita/{{$beritas->id_berita}}" class="btn btn-main">Detail Berita</a>
					</div>
				</div>
			</div>	
			@endforeach
		</div>
	</div>
</section>

{{--Layanan--}}
<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Produk Pertanian</h2>
			</div>
		</div>
		<div class="row">
			@foreach ($produks as $produks)
				<div class="col-md-4 col-xs-6">
					<div class="product-item">
						<div class="product-thumb">
							<img class="img-responsive" src="{{ asset('image/produk/'.$produks->picture) }}" alt="product-img" />
							
						</div>
						<div class="product-content">
							<h4><a href="/produk/detail/{{$produks->id_produk}}">{{$produks->produk}}</a></h4>
							<p class="price">{{$produks->description}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

{{-- Link Terkait --}}
<section class="team-members ">
	<div class="container">
		<div class="row">
			<div class="title"><h2>Jenis Tanah</h2></div>
		</div>
		<div class="row">
			<div class="d-flex justify-content-between">
				@foreach ($tanahs as $tanahs)
					<div class="col-md-3 col-xs-4" style="box-shadow: 12px">
						<div class="team-member text-center">
							<img class="img-circle" src="{{ asset('image/tanah/'.$tanahs->picture) }}">
							<h4>{{$tanahs->tanah}}</h4>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>