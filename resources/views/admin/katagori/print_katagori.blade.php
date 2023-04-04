<!DOCTYPE html>
<html>
<head>
	<title>Laporan Katagori</title>
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
		<h5>Laporan Katagori</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Katagori</th>
				<th scope="col">Description</th>
				<th scope="col">Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
            @foreach ($katagori as $katagori)
          <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$katagori->katagori}}</td>
            <td>{{$katagori->description}}</td>
			<td>{{$katagori->created_at}}</td>
          </tr>
        @endforeach
		</tbody>
	</table>
</body>
</html>