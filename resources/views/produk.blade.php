<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Produks</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
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
            @foreach ($produks as $produks)
            <div class="col-md-6">
		        <div class="post">
		          <div class="post-thumb">
		            <a href="blog-single.html">
		              <img class="img-responsive" src="{{ asset('image/produk/'.$produks->picture)}}" alt="">
		            </a>
		          </div>
		          <h2 class="post-title"><a href="blog-single.html">{{$produks->produk}}</a></h2>
		          <div class="post-meta">
		            <ul>
		              <li>
		                <i class="tf-ion-ios-calendar"></i> {{$produks->created_at}}
		              </li>
		            </ul>
		          </div>
		          <div class="post-content">
		            <p>{{$produks->description}} </p>
		            <a href="/produk/detail/{{$produks->id_produk}}" class="btn btn-main">Continue Reading</a>
		          </div>
				</div>
        	</div>
            @endforeach
	    </div>
    </div>
</div>