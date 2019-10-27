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
		width: 60%;
		height: 130%;

		margin-left: 17%;
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
	#uploadFile{
		margin-top:70px;
		height: 50px;
		width: 170px;
		border-radius: 5px;
		border-style: groove;
		background-color: #2498DB;
		color: white;
	}
</style>
<div id="form1">
	@if($errors->has('success'))
	<div class="alert alert-success">Succes</div>
	@endif
	@if($errors->has('alert'))
	<div class="alert alert-success">{{ $message }}</div>
	@endif
	<h1>Dokumentasi Kegiatan PUB</h1>
	<div class="container">
		<a href="{{url('tambah_pubdok')}}"><button id="uploadFile">Tambah</button></a>
		<table id="myTable">
			<thead>
				<tr>
					<th>NO</th>
					<th>ANGKATAN</th>
					<th>KEGIATAN DIVISI</th>
					<th>KETERANGAN</th>
					<th>DOKUMENTASI</th>
					
				</tr>
			</thead>
			<tbody>
				@php $no=1; @endphp
				@foreach($kegiatan as $keg)
				<tr>
					<td>{{$no++}}</td>
						<td> Angkatan {{$keg->angkatan}}</td>
						<td>{{$keg->tema}}</td>
					<td>{{$keg->keterangan}}</td>
					<td><img src="{{url('imgs/kegiatan')}}/{{$keg->file}}" width="200px"></td>
					<td><a href="{{url('hapus/kegiatan/'.$keg->id_pubdok)}}"><button class="btn btn-primary" style="background-color: red;">Hapus</button></a>&nbsp;&nbsp;<a href="{{url('edit/kegiatan/'.$keg->id_pubdok)}}"><button class="btn btn-primary">Edit</button></a></td>
				</tr>
				@endforeach
				
            </select>
			</tbody>
		</table>
	</div>
</div>
@include('tampilan.foot')
