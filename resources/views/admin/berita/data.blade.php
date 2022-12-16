    
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">User</th>
        <th scope="col">Picture</th>
        <th scope="col">Title</th>
        <th scope="col">Isi</th>
        <th scope="col">Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($berita as $berita)
          <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$berita->id_user}}</td>
            <td>{{$berita->picture}}</td>
            <td>{{$berita->title}}</td>
            <td>{{$berita->isi}}</td>
            <td>{{$berita->status}}</td>
            <th class="text-center">
                <i class="mdi mdi-pencil-circle-outline" onclick="update({{$berita->id_berita}})"></i>
                <i class="mdi mdi-close text-danger" onclick="hapus({{$berita->id_berita}})"></i>
            </th>
          </tr>
        @endforeach
      
    </tbody>
  </table>