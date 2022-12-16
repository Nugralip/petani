<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('assets/image/photo/4.png') }}" class="d-block w-100" data-bs-interval="800" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>First slide label</h3>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/image/photo/5.png') }}" class="d-block w-100" data-bs-interval="800" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Second slide label</h3>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/image/photo/6.png') }}" class="d-block w-100" data-bs-interval="800" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Third slide label</h3>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container px-5">
  <div class="berita ">
    <div class="row">
      <h2 class="text-petani col-8 ">Berita Populer</h2>
      {{-- <h2 class="col-md-auto"></h2> --}}
      <a href="" class="btn bg-petani btn-dark col-4"> <span><b>Lainnya</b></span></a>
    </div>
    <hr class="md-12">
    <div class="row">
      <div class="col-md-4 mb-2">
        <div class="card">
          <img src="{{ asset('assets/image/photo/1.png') }}" class="card-img-top" alt="...">
        
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn bg-petani btn-dark w-100">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-2">
        <div class="card">
          <img src="{{ asset('assets/image/photo/1.png') }}" class="card-img-top" alt="...">
        
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn bg-petani btn-dark w-100">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-2">
        <div class="card">
          <img src="{{ asset('assets/image/photo/1.png') }}" class="card-img-top" alt="...">
        
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn bg-petani btn-dark w-100">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-gradasi">
  <div class="container">
    <div class="card background-petani" style="bag">
      <h2>Harga Pasar</h2>
    </div>

  </div>
</div>

