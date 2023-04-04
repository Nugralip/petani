<!DOCTYPE html>
<html>
<head>
	<title>Laporan Berita</title>
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
		<h5>Laporan Berita</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Status</th>
				<th scope="col">Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
            @foreach ($berita as $berita)
          <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$berita->picture}}</td>
            <td>{{$berita->title}}</td>
            <td>{{$berita->isi}}</td>
            <td>{{$berita->status}}</td>
			<td>{{$berita->created_at}}</td>
          </tr>
        @endforeach
		</tbody>
	</table>
</body>
</html>