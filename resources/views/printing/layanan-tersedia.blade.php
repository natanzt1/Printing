<!DOCTYPE html>
<html>
<head>
	<title>Layanan Tersedia</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container" align="center">
		<h4>{{$printing->nama}}</h4>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Jenis Printing</th>
		      <th scope="col">Jenis Kertas</th>
			  <th scope="col">Ukuran Kertas</th>
			  <th scope="col">Harga</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($jenis_prints as $i=>$jenis_p)
		    <tr>
		      <th scope="row">{{$i+1}}</th>
		      <td>{{$jenis_p->jenis_printing->nama}}</td>
		      <td>{{$jenis_p->jenis_kertas->nama}}</td>
		      <td>{{$jenis_p->ukuran_kertas->nama}}</td>
		      <td>{{$layanans[$i]->harga}}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<a href="/printing/layanan/{{$id}}/create"><button class="btn btn-primary">Tambah</button></a>
	</div>
</body>
</html>