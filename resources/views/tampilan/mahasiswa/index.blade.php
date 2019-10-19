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
				width: 100%;
				border-radius: 5px;
				background-color: #ffffff;
				padding: 0px;
				margin-left: 2px;
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
				width: 100%;
				height: 100%;
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

		</style>

		<div id="form1">
			<br>
			<h1>Daftar Mahasiswa PUB</h1>
			<div class="container">
				<a href="{{url('tambah/mahasiswa')}}"><button class="btn btn-primary" style=" background-color: #339966; width: 100%;"><svg class="glyph stroked plus sign" style="height: 30px;"><use xlink:href="#stroked-plus-sign"/></svg></button></a>
				<table id="myTable">
					<thead>
						<tr>
							<th>NIM</th>
							<th>NAMA</th>
							<th>TTL</th>
							<th>ASAL DAERAH</th>
							<th>ASAL SEKOLAH</th>
							<th>JABATAN DI PUB</th>
							<th>JABATAN DI PPMB</th>
							<th>STATUS PUB</th>
							<th>PRODI</th>
							<th>NO TELPON</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach($mahasiswa as $mhs)
						<tr>
							<td>{{$mhs->nim}}</td>
							<td>{{$mhs->nama}}</td>
							<td>{{$mhs->tempat_lahir}},&nbsp;{{$mhs->tanggal_lahir}}</td>
							<td>{{$mhs->kab_kot}}</td>
							<td>{{$mhs->sekolah}}</td>
							<td>{{$mhs->jabatan_pub}}</td>
							<td>{{$mhs->jabatan}}</td>
							<td>{{$mhs->status}}</td>
							<td>{{$mhs->nama_jur}}</td>
							<td>{{$mhs->no_telp}}</td>
							<td><a href="{{url('detail/org/'.$mhs->id_mahasiswa)}}"><button type="reset" class="btn btn-default">Detail</button></a>&nbsp;&nbsp;
							<a href="{{url('mahasiswaHapus/'.$mhs->id_mahasiswa)}}"><button class="btn btn-primary" style="background-color: red;">Hapus</button></a>&nbsp;&nbsp;
							<a href="{{url('mahasiswaEdit/'.$mhs->id_mahasiswa)}}"><button class="btn btn-primary">Edit</button></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		@include('tampilan.foot')

