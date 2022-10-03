<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pendaftaran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
    <!-- <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
 
   
   
</head>
<body>
   
	<div class="container">
		<center>
			<img src="{{ asset($sk->photo) }}" style="width: 200px;">
		</center>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tbody>
						<tr>
							<th>Nama Sekolah</th>
							<td>:</td>
							<td>{{ $sk->nama }}</td>

							<th style="padding-left: 50px;">Alamat</th>
							<td>:</td>
							<td>{{ $sk->alamat }}</td>
						</tr>

						<tr>
							<th>No Telp</th>
							<td>:</td>
							<td>{{ $sk->no_telp }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<br>
		<hr>
		<br>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th width="100">Nama</th>
							<th width="100">Email</th>
							<th width="100">Alamat</th>
							<th width="100">No HP</th>
							<th width="100">Tempat Lahir</th>
							<th width="100">ID Pendaftaran</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $dt->name }}</td>
							<td>{{ $dt->email }}</td>
							<td>{{ $dt->biodata_r->alamat }}</td>
							<td>{{ $dt->biodata_r->no_hp }}</td>
							<td>{{ $dt->biodata_r->tempat_lahir }}</td>
							<td>{{ $dt->id_registrasi }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>