<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Produk</h1>
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">produk</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
                @foreach ($produk as $produk)
                <div class="post">
                    <div class="post-media post-thumb">
                        <a href="blog-single.html">
                            <img src="{{asset('image/produk/'.$produk->picture)}}" alt="">
                        </a>
                    </div>
                    <h2 class="post-title"><a href="blog-single.html">{{$produk->produk}}</a></h2>
                    <div class="post-meta">
                        <ul>
                            <li>
                                <i class="tf-ion-ios-calendar"></i>{{$produk->created_at}}
                            </li>
                            {{-- <li>
                                <i class="tf-ion-android-person"></i> POSTED BY {{$produk->name}}
                            </li> --}}
                        </ul>
                    </div>
                    <div class="post-content">
						<h2>{{ number_format($produk->price)}}
						</h2>
                    </div>
					<div class="post-content">
						<h3>Description</h3>
                        <p>{{$produk->description}}</p>
                    </div>
					<div class="post-content">
						<h3>Procedur</h3>
                        <p>{{$produk->procedur}}</p>
                    </div>
					<div class="post-content">
						<h3>Superiority</h3>
                        <p>{{$produk->superiority}}</p>
                    </div>
					<div class="post-content">
						<h3>Deficiency</h3>
                        <p>{{$produk->deficiency}}</p>
                    </div>
                </div>
                @endforeach
        		
      		</div>
      		<div class="col-md-4">
				<aside class="sidebar">

	<!-- Widget Latest Posts -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Latest Posts</h4>
        @foreach ($produks as $produks)
        <div class="media">
			<a class="pull-left" href="#!">
				<i mg class="media-object" src="{{ asset('image/produk/'.$produks->picture)}}" alt="Image">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a href="#!">{{$produks->title}}</a></h4>
				<p>{{$produks->isi}}</p>
			</div>
		</div>
        @endforeach
		
	</div>
	<!-- End Latest Posts -->

	





</aside>
      		</div>
		</div>
	</div>
</div>