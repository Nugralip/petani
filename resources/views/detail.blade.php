<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Berita</h1>
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">berita</li>
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
                @foreach ($berita as $berita)
                <div class="post">
                    <div class="post-media post-thumb">
                        <a href="blog-single.html">
                            <img src="{{asset('image/berita/'.$berita->picture)}}" alt="">
                        </a>
                    </div>
                    <h2 class="post-title"><a href="blog-single.html">{{$berita->title}}</a></h2>
                    <div class="post-meta">
                        <ul>
                            <li>
                                <i class="tf-ion-ios-calendar"></i>{{$berita->created_at}}
                            </li>
                            <li>
                                <i class="tf-ion-android-person"></i> POSTED BY {{$berita->name}}
                            </li>
                        </ul>
                    </div>
                    <div class="post-content">
                        <p> {{$berita->isi}}</p>
                    </div>
                </div>
                @endforeach
        		
      		</div>
      		<div class="col-md-4">
				<aside class="sidebar">

	<!-- Widget Latest Posts -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Latest Posts</h4>
        @foreach ($beritas as $beritas)
        <div class="media">
			<a class="pull-left" href="#!">
				<img class="media-object" src="{{ asset('image/berita/'.$beritas->picture)}}" alt="Image">
			</a>
			<div class="media-body">
				<h4 class="media-heading txt-oev-3"><a href="#!">{{$beritas->title}}</a></h4>
				<p class="txt-oev-3">{{$beritas->isi}}</p>
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