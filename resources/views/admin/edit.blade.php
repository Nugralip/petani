    @foreach ($mid as $mid)
    <form method="post" action="/mid/proses">
        {{ csrf_field() }}
    <div class="form-group">
        <input type="hidden" name="id" value="{{$mid->id_user}}">
        <label for="exampleFormControlInput4">Username</label>
        <input type="text" required="required" class="form-control rounded-0" id="exampleFormControlInput4" placeholder="Enter Username" value="{{$mid->username}}" name="username">
      </div>
      <div class="form-group">
        <label for="exampleFormControlPasswor3">Nama</label>
        <input type="text" required="required" class="form-control rounded-0" id="exampleFormControlPasswor3" placeholder="Enter Nama" value="{{$mid->name}}" name="nama">
      </div>
      <div class="form-group">
        <label for="exampleFormControlPasswor3">Alamat</label>
        <input type="text" required="required" class="form-control rounded-0" id="exampleFormControlPasswor3" placeholder="Enter Alamat" value="{{$mid->address}}" name="alamat">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect14">Actor</label>
        <select required="required" class="form-control rounded-0" id="exampleFormControlSelect14" name="level">
          <option disabled>Select Actor</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select> 
      </div>
      <div class="form-footer">
        <input type="submit" value="Simpan Data" class="btn btn-secondary btn-pill" >
        <a href="/mid" class="btn btn-light btn-pill"> Cancel </a>
      </div>
    
    </form>  
    @endforeach
    