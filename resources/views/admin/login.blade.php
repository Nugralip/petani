<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="card card-default mb-0">  
            <div class="card-header pb-0">
              <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                <a class="w-auto pl-0" href="">
                  <span class="brand-name text-lg text-success">PETANI</span>
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-5 pt-0">

              <h4 class="text-dark mb-6 text-center">Sign in for Admin</h4>

              <form action="{{asset('/login/check') }}"  method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="text" class="form-control input-lg" id="text" name="username" placeholder="Username">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="col-md-12">

                    <button type="submit" value="login" class="btn btn-success btn-pill mb-4">Sign In</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
