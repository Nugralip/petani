    
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Katagori</th>
        <th scope="col">Description</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach ($katagori as $katagori)
          <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$katagori->katagori}}</td>
            <td>{{$katagori->description}}</td>
            <th class="text-center">
                <i class="mdi mdi-pencil-circle-outline" onclick="update({{$katagori->id_kata}})"></i>
                <i class="mdi mdi-close text-danger" onclick="hapus({{$katagori->id_kata}})"></i>
            </th>
          </tr>
        @endforeach
      
    </tbody>
  </table>