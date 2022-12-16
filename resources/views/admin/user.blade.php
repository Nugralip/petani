<div class="card p-2">
  <a href="mid/tambah" class="mb-2 btn btn-pill btn-success col-lg-2">Tambah</a>
  <table id="productsTable" class="table table-hover table-product" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>ID</th>
          <th>Username</th>
          <th>Level</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $user)
        <tr>
          <td>{{$nomor++}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->id_user}}</td>
          <td>{{$user->username}}</td>
          <td>{{$user->level}}</td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>
    
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/edit/{{$user->id_user}}">Edit</a>
                <a class="dropdown-item" href="/mid/dalete/{{$user->id_user}}">Hapus</a>
              </div>
            </div>
          </td>
        </tr> 
        @endforeach
        
      </tbody>
    </table> 
  </div> 