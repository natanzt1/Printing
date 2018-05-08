<!DOCTYPE html>
<html>
<head>
	<title>Set Detail Print</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Printing</th>
	      <th scope="col">Jenis</th>
	      <th scope="col">Ukuran</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($printings as $i=>$printing)
	    <tr>
	      <th scope="row">{{$i+1}}</th>
	      <td>{{$printing->jenis_printing->nama}}</td>
	      <td>{{$printing->jenis_kertas->nama}}</td>
	      <td>{{$printing->ukuran_kertas->nama}}</td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	<a href="/admin/print/create"><button class="btn btn-primary">Tambah</button></a>	
</body>
</html>