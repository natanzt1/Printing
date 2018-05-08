<!DOCTYPE html>
<html>
<head>
	<title>Set Detail Print</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container" style="margin-left: 22.5%">
		<form method="POST" action="/admin/print">
			@csrf
		  	<div class="form-row align-items-center">
		    	<div class="col-auto" align="center">
			      	<label for="inlineFormInput">Jenis Print</label>
			      	<select class="form-control" name="jenis_printing">
				      	@foreach($jeniss_p as $jenis_p)
				  			<option value="{{$jenis_p->id}}">{{$jenis_p->nama}}</option>
			  			@endforeach	
		  			</select>
		    	</div>

			    <div class="col-auto" align="center">
				    <label for="inlineFormInput">Jenis Kertas</label>
				    <select class="form-control" name="jenis_kertas">
				      	@foreach($jeniss_k as $jenis_k)
				  			<option value="{{$jenis_k->id}}">{{$jenis_k->nama}}</option>
			  			@endforeach
			  		</select>
			    </div>

			<div class="col-auto" align="center">
		      <label for="inlineFormInput">Ukuran Kertas</label>
		      <select class="form-control" name="ukuran_kertas">
		      	@foreach($ukurans_k as $ukuran_k)
		  			<option value="{{$ukuran_k->id}}">{{$ukuran_k->nama}}</option>
	  			@endforeach
	  		</select>
	  		</div>

		    <div class="col-auto" style="margin-top: 2.5%">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		  </div>
		</form>
	</div>
	</div>
</body>
</html>