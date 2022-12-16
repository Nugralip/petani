  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-nav">
    <div class="container">
      <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('assets/image/petani/petani_p.png') }}" alt=""></a>
      <button class="navbar-toggler" type="button" style="box-shadow: none;border: none;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-petani" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <img class="logo" src="{{ asset('assets/image/petani/petani_p.png') }}" alt="">
          <button type="button" style="box-shadow: none;" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item berubah">
              <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Pasar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><b>Regis</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><b>Login</b> </a>
          </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>