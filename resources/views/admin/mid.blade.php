<div class="card p-2">
    <a href="mid/tambah" class="mb-2 btn btn-sm btn-pill btn-success col-lg-2">Tambah</a>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Alamat</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mid as $mid)
          <tr>
            <td>{{$nomor++}}</td>
            <td>{{$mid->name}}</td>
            <td>{{$mid->username}}</td> 
            <td>{{$mid->level}}</td>
            <td>{{$mid->address}}</td>
            <td>
              <div class="dropdown">
                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                </a>
      
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="/edit/{{$mid->id_user}}">Edit</a>
                  <a class="dropdown-item" href="/mid/dalete/{{$mid->id_user}}">Hapus</a>
                </div>
              </div>
            </td>
          </tr> 
          @endforeach
          
        </tbody>
      </table> 
    </div> 