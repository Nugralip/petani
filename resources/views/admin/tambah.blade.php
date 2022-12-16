


<form method="post" action="/mid/prosest">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlInput4">Username</label>
      <input type="text" class="form-control rounded-0" id="exampleFormControlInput4" placeholder="Enter Username" name="username">
    </div>
    <div class="form-group">
      <label for="exampleFormControlPasswor3">Nama</label>
      <input type="text" class="form-control rounded-0" id="exampleFormControlPasswor3" placeholder="Enter Nama" name="nama">
    </div>
    <div class="form-group">
      <label for="exampleFormControlPasswor3">Alamat</label>
      <input type="text" class="form-control rounded-0" id="exampleFormControlPasswor3" placeholder="Enter Alamat" name="alamat">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect14">Actor</label>
      <select class="form-control rounded-0" id="exampleFormControlSelect14" name="level">
        <option disabled>Select Actor</option>
        <option value="admin">Admin</option>
        <option value="user">User</option> 
      </select>
    </div>
    <div class="form-footer">
      <button type="submit" value="simpan" class="btn btn-secondary btn-pill">Submit</button>
      <a href="/mid" class="btn btn-light btn-pill"> Cancel </a>
    </div>
  
  </form>  