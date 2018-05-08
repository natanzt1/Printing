<!DOCTYPE html>
<html>
<head>
	<title>Layanan Tersedia</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container" style="width: 75%">
		<h4>{{$printing->nama}}</h4>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Jenis Printing</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($jeniss_p as $i=>$jenis_p)
		    <tr>
		      <th scope="row">{{$i+1}}</th>
		      <!--<td>{{$jeniss_p_id}}</td> Id nya nanti taruh di button edit dll-->
		      <td>{{$jenis_p}}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<a href="/admin/print/create"><button class="btn btn-primary">Tambah</button></a>	
	</div>
</body>
</html>