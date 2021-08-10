<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Edit Data Kuliner</h1>
		<div class="row">
			<div class="col-lg-12">
			<form action="/kuliner/{{$kuliner->id}}/update" method="post">
				        {{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Kuliner</label>
						    <input name="nama_kuliner" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$kuliner->nama_kuliner}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleFormControlTextarea1">Deskripsi</label>
						    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$kuliner->deskripsi}}</textarea>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Lokasi</label>
						    <input name="lokasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$kuliner->lokasi}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Waktu Buka</label>
						    <input name="waktu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$kuliner->waktu}}">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Harga</label>
						    <input name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$kuliner->harga}}">
						  </div>
						  <button type="submit" class="btn btn-primary">Update</button>
		  				</form>
				</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

