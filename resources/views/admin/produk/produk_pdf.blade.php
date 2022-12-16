<!DOCTYPE html>
<html>
<head>
	<title>Laporan Produk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Produk</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th>
                <th scope="col">Produk</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Procedur</th>
                <th scope="col">Superiority</th>
                <th scope="col">Deficiency</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
            @foreach ($produk as $produk)
          <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$produk->produk}}</td>
            <td>{{$produk->price}}</td>
            <td>{{$produk->description}}</td>
            <td>{{$produk->procedur}}</td>
            <td>{{$produk->superiority}}</td>
            <td>{{$produk->deficiency}}</td>
          </tr>
        @endforeach
		</tbody>
	</table>
</body>
</html>