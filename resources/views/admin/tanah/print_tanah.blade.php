<!DOCTYPE html>
<html>
<head>
	<title>Laporan Tanah</title>
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
		<h5>Laporan Tanah</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Jenis Tanah</th>
				{{-- <th scope="col">Picture</th> --}}
				<th scope="col">Texture</th>
				<th scope="col">Description</th>
				<th scope="col">Procedur</th>
				<th scope="col">Superiority</th>
				<th scope="col">Recomendation</th>
				<th scope="col">Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
            @foreach ($tanah as $tanah)
          <tr>
            <td scope="row">{{$no}}</td>
            <td>{{$tanah->tanah}}</td>
            {{-- <td><img style="max-width: 100px" src="{{ asset('image/tanah/'.$tanah->picture) }}" alt=""></td> --}}
            <td>{{$tanah->texture}}</td>
            <td>{{$tanah->description}}</td>
            <td>{{$tanah->procedur}}</td>
            <td>{{$tanah->superiority}}</td>
            <td>{{$tanah->recomendation}}</td>
			<td>{{$tanah->created_at}}</td>
          </tr>
        @endforeach
		</tbody>
	</table>
</body>
</html>