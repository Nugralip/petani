    
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Produk</th>
        <th scope="col">Texture</th>
        <th scope="col">Description</th>
        <th scope="col">Procedur</th>
        <th scope="col">Superiority</th>
        <th scope="col">Recomendation</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($tanah as $tanah)
          <tr>
            <td scope="row">{{$no}}</td>
            <td>{{$tanah->tanah}}</td>
            <td>{{$tanah->texture}}</td>
            <td>{{$tanah->description}}</td>
            <td>{{$tanah->procedur}}</td>
            <td>{{$tanah->superiority}}</td>
            <td>{{$tanah->recomendation}}</td>
            <th class="text-center">
                <i class="mdi mdi-pencil-circle-outline" onclick="update({{$tanah->id_tanah}})"></i>
                <i class="mdi mdi-close text-danger" onclick="hapus({{$tanah->id_tanah}})"></i>
            </th>
          </tr>
        @endforeach
      
    </tbody>
  </table>