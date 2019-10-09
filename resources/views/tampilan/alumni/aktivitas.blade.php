
@include('tampilan.head')


<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 17px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  margin-left: 100px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #ffffff;
  padding: 5px;
}

.col-25 {
  padding-left: 100px;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  padding-left: 100px;
  width: 50%;
  margin-top: 6px;
}
#form1{
	width: 750px;
	height: 500px;
	
	margin-left: 300px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}



/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div id="form1">
	<div class="container">
	  <form action="">
	  <div class="row">
	    <div class="col-75">
	      <h2 align="center">Dokumentasi Alumni PUB</h2>
	    </div>
	  </div>
	  <div class="row">
	  	<div class="col-25">
	  <table class="table table-bordered">
	<h2 align="center">Dokumentasi Alumni</h2>
	<tr>
		<th>Foto</th>
		<th>Keterangan</th>
		<th ><a href="{{('tambahdok_alumni')}}" class="btn btn-primary">Tambah Dokumensi</a></th> 
	</tr>
	<tbody>
		@foreach($dokalumni as $data)
		<td><img src="alumni/images/gambar/{{($data->foto_alumni)}}"width='100'></td>
		<td>{{($data->keterangan)}}</td>		
			<a href="{{url('')}}" class="btn btn-warning">Ubah</a>
			<br/><br/>
			<a href="{{url()}}" class="btn-danger btn" onclick="return confirm('apakah anda yakin?')">Hapus</a>
		</td>
	</tr>
	<?php $nomor++; ?>
	@endforeach
</tbody>
</table>
	   </div>
	  </div>
	  </form>
	</div>
</div>
	
@include('tampilan.foot')
