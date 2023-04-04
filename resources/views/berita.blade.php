<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Berita</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">berita</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
@if ($s_id != "")
	<section class="page-wrapper">
		<div class="contact-section">
			<div class="container">
				<div class="row">
					<!-- Contact Form -->
					<div class="contact-form col-md-12 " >
						<form id="contact-form" method="post" action="/admin/berita/store" role="form" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<input type="hidden" name="id_user" value="{{$s_id}}">
								<input type="file" placeholder="picture" class="form-control" name="image" id="image">
							</div>
							
							<div class="form-group">
								<input type="text" placeholder="Judul" class="form-control" name="title" id="title">
							</div>
							
							<div class="form-group">
								<textarea rows="6" placeholder="Isi Berita" class="form-control" name="isi" id="isi"></textarea>	
							</div>
							
							<div id="cf-submit">
								<input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
							</div>						
							
						</form>
					</div>
					<!-- ./End Contact Form -->
						
					
				
				</div> <!-- end row -->
			</div> <!-- end container -->
		</div>
	</section>
@endif

<div class="page-wrapper">
	<div class="container">
		<div class="row">
            @foreach ($beritas as $beritas)
            <div class="col-md-6">
		        <div class="post">
		          <div class="post-thumb">
		            <a href="berita/{{$beritas->id_berita}}">
		              <img class="img-responsive" src="{{asset('image/berita/'.$beritas->picture)}}" alt="">
		            </a>
		          </div>
		          <h2 class="post-title txt-oev-3"><a href="berita/{{$beritas->id_berita}}">{{$beritas->title}}</a></h2>
		          <div class="post-meta">
		            <ul>
		              <li>
		                <i class="tf-ion-ios-calendar"></i>{{$beritas->created_at}}
		              </li>
		              <li>
		                <i class="tf-ion-android-person"></i> POSTED BY {{$beritas->name}}
		              </li>
		            </ul>
		          </div>
		          <div class="post-content">
		            <p class="txt-oev-3">{{$beritas->isi}} </p>
		            <a href="berita/{{$beritas->id_berita}}" class="btn btn-main">Continue Reading</a>
		          </div>
				</div>
        	</div>
            @endforeach
		</div>
  	</div>
</div>