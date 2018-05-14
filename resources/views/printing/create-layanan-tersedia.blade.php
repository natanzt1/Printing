<!DOCTYPE html>
<html>
<head>
	<title>Layanan Tersedia</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container" style="width: 75%" align="center">
		<h4>{{$printing->nama}}</h4>
		<form method="POST" action="/printing/layanan/{{$id}}">
			@csrf
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Jenis Layanan</th>
			      <th scope="col">Jenis Kertas</th>
			      <th scope="col">Ukuran Kertas</th>
			      <th scope="col">Pilih</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($details as $i=>$detail)
			    <tr>
				    <th scope="row">{{$i+1}}</th>
				    <td>{{$detail->jenis_printing->nama}}</td>
				    <td>{{$detail->jenis_kertas->nama}}</td>
				    <td>{{$detail->ukuran_kertas->nama}}</td>
				    <td>
					    <div class="form-check">
						  	<input class="form-check-input" type="checkbox" name="layanan[]" value="{{$detail->id}}">
						</div>
					</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			<input type="submit" name="submit" class="btn btn-primary" value="Tambah">
		</form>
	</div>
</body>
</html>