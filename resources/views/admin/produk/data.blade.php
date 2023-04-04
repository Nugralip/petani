    
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Produk</th>
        <th scope="col">Picture</th>
        <th scope="col">Price</th>
        {{-- <th scope='col'>Categories</th> --}}
        <th scope="col">Description</th>
        <th scope="col">Procedur</th>
        <th scope="col">Superiority</th>
        <th scope="col">Deficiency</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($produk as $produk)
          <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$produk->produk}}</td>
            <td><img style="max-width: 100px" src="{{ asset('image/produk/'.$produk->picture) }}" alt=""></td>
            <td>{{$produk->price}}</td>
            {{-- <td>{{$produk->id_kata.".".$produk->katagori}}</td> --}}
            <td>{{$produk->description}}</td>
            <td>{{$produk->procedur}}</td>                                                                                                                                                                                                                                                                                                                                                                                                                              
            <td>{{$produk->superiority}}</td>
            <td>{{$produk->deficiency}}</td>
            <th class="text-center">
                <i class="mdi mdi-pencil-circle-outline" onclick="update({{$produk->id_produk}})"></i>
                <i class="mdi mdi-close text-danger" onclick="hapus({{$produk->id_produk}})"></i>
            </th>
          </tr>
        @endforeach
    </tbody>
  </table>