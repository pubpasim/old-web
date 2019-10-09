@include('tampilan.head')
	<style>
		#dataTable {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 75%;
			margin-right: 50px;
		}

		#dataTable td, #dataTable th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#dataTable tr:nth-child(even){background-color: #f2f2f2;}

		#dataTable tr:hover {background-color: #ddd;}

		#dataTable th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
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
			padding: 30px;
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
		<h1>Daftar Mahasiswa PUB</h1>
		<div class="container">
			<a href="{{url('tambahAlumni')}}"><button class="btn btn-primary" style=" background-color: #339966; width: 100%;"><svg class="glyph stroked plus sign" style="height: 30px;"><use xlink:href="#stroked-plus-sign"/></svg></button></a>
			<table id="myTable">
				
				<thead>
					<tr>
						<th>NIM</th>
						<th>NAMA</th>
						<th>ASAL DAERAH</th>
						<th>ASAL SEKOLAH</th>
						<th>JABATAN DI PUB</th>
						<th>JABATAN DI PPMB</th>
						<th>STATUS PERNIKAHAN</th>
						<th>JURUSAN</th>
						<th>AKSI</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($mahasiswa as $mhs)
					<tr>
						<td>{{$mhs->nim}}</td>
						<td>{{$mhs->nama}}</td>
						<td>{{$mhs->kab_kot}}</td>
						<td>{{$mhs->sekolah}}</td>
						<td>{{$mhs->jabatan_pub}}</td>
						<td>{{$mhs->jabatan}}</td>
						<td>{{$mhs->status}}</td>
						<td>{{$mhs->nama_jur}}</td>
						<td><button type="reset" class="btn btn-default">Detail</button></td>
						<td><button class="btn btn-primary" style="background-color: red;">Hapus</button></td>
						<td><button class="btn btn-primary">Edit</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@include('tampilan.foot')

